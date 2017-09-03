<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/3/2017
 * Time: 4:31 PM
 */

class Ema_Model_EntityModel
{
    /**
     * @var Zend_Registry
     */
    protected $registry;

    /**
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db;

    /**
     * @var Zend_Db_Adapter_Abstract
     */
    protected $emaDb;

    /**
     * @var Zend_Config_Ini
     */
    protected $config;

    /**
     * @var Zend_Config_Xml
     */
    protected $options;

    /**
     * @var array
     */
    protected $settings;

    /**
     * Ema_Model_EntityModel constructor.
     * @param Zend_Registry $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }
}
