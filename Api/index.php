<?php
/**
 * DotBoost Technologies Inc.
 * DotKernel Application Framework
 *
 * @category   DotKernel
 * @package    Api
 * @copyright  Copyright (c) 2009-2015 DotBoost Technologies Inc. (http://www.dotboost.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version    $Id: index.php 1024 2016-06-06 16:33:55Z gabi $
 */

/**
 * API controller
 * example usage:
 *    /var/www/example.com/api/index.php?action=opcache&key=XXXXXDKXXXXX
 * @author     DotKernel Team <team@dotkernel.com>
 */

// Define application environment
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Define application path
define('APPLICATION_PATH', realpath(dirname(__DIR__)));

// Define API path
define('API_PATH', realpath(dirname(__FILE__)));

//Set include  path to library directory
set_include_path(implode(PATH_SEPARATOR, array(APPLICATION_PATH . '/library', get_include_path())));

// Define PATH to configuration
define('CONFIGURATION_PATH', APPLICATION_PATH . '/configs');

chdir(dirname(__DIR__));

$composerAutoLoaderPath = realpath('./vendor/autoload.php');
 
$composerEnabled = file_exists($composerAutoLoaderPath);
 
if($composerEnabled == true) 
{
    require_once($composerAutoLoaderPath);
}
else
{
    // handle the error gracefully
   // or load fallbacks - if exist
   // Load Zend Framework
#require_once 'Zend/Loader/Autoloader.php';
#
exit('500 - Missing dependencies');
}

$zendLoader = Zend_Loader_Autoloader::getInstance();
$zendLoader->registerNamespace('Dot_');
$zendLoader->registerNamespace('Api_');
$zendLoader->registerNamespace('Plugin_');
$zendLoader->registerNamespace('Ema_');

// Create registry object, as read-only object to store there config, settings, and database
$registry = Dot_Kernel::initializeRegistry();

// Load configuration settings from application.ini file and store it in registry
$config = new Zend_Config_Ini(CONFIGURATION_PATH.'/application.ini', APPLICATION_ENV);
$registry->configuration = $config;

// load the plugin configuration
$registry->pluginConfiguration = Dot_Kernel::loadPluginConfiguration();


// Set PHP configuration settings from application.ini file
Dot_Settings::setPhpSettings($config->phpSettings->toArray());

// check if api enabled from application.ini 
if($registry->configuration->api->params->enable != true)
{
	Api_Model_Header::setHeaderByCode(403);
	exit;
}

// Get the action and the other arguments
$arguments = array();
$arguments = $_GET;

$arguments['key'] = (isset($arguments['key'])) ? $arguments['key'] : '';

$action = '';
if(isset($arguments['action']))
{
	$action = $arguments['action'];
	unset($arguments['action']);
}
$registry->action = $action;
$registry->arguments = $arguments;

// check the API key
if($registry->configuration->api->params->key != $registry->arguments['key'])
{
	Api_Model_Header::setHeaderByCode(403);
	
	$data = array();
	$data[] = array('result' => 'error');
	$data[] = array('response' => "Invalid Key");
	$jsonString = Zend_Json::encode($data);
	echo $jsonString;
	exit;
}

// check rate limit 
if($registry->configuration->api->params->lifetime == strtolower('minute'))
{
	$timeKey = date("i");
	$ttl = 60;
}
else
{
	// h - 12 hrs ; H - 24 hrs 
	$timeKey = date("H");
	$ttl = 3600;
}

$cacheRateKey =  $registry->configuration->api->params->prefix 
				.'_'.$registry->arguments['key'] .'_'.$timeKey ; 
// using apcu directly
Dot_Cache::loadCache();
/* // disable caching system
if(!Dot_Cache::testCache('api_text', 'api_test'))
{
	Api_Model_Header::setHeaderByCode(503);
	exit;
}
//*/

// for more info about the caching layer see    http://www.dotkernel.com/tag/dotkernel-caching/
$rate = (int)(Dot_Cache::load($cacheRateKey));
$rateLimit = $registry->configuration->api->params->rate_limit ;
if($rate > $rateLimit)
{
	Api_Model_Header::setHeaderByCode(403);
	exit;
}

Dot_Cache::save(1+$rate, $cacheRateKey, $ttl);

// Create  connection to database, as singleton , and store it in registry
$db = Zend_Db::factory('Pdo_Mysql', $config->database->params->toArray());
$registry->database = $db;

// Load specific configuration settings from database, and store it in registry
$settings = Dot_Settings::getSettings();
$registry->settings = $settings;
$registry->option = array();


// 
include('Controller.php');