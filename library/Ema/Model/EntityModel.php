<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/3/2017
 * Time: 4:31 PM
 */

class Ema_Model_EntityModel implements Ema_Model_EmaModelInterface
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
     * @return Zend_Registry
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @param Zend_Registry $registry
     * @return Ema_Model_EntityModel
     */
    public function setRegistry($registry)
    {
        $this->registry = $registry;
        return $this;
    }

    /**
     * @return Zend_Db_Adapter_Abstract
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param Zend_Db_Adapter_Abstract $db
     * @return Ema_Model_EntityModel
     */
    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    /**
     * @return Zend_Db_Adapter_Abstract
     */
    public function getEmaDb()
    {
        return $this->emaDb;
    }

    /**
     * @param Zend_Db_Adapter_Abstract $emaDb
     * @return Ema_Model_EntityModel
     */
    public function setEmaDb($emaDb)
    {
        $this->emaDb = $emaDb;
        return $this;
    }

    /**
     * @return Zend_Config_Ini
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Zend_Config_Ini $config
     * @return Ema_Model_EntityModel
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return Zend_Config_Xml
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Zend_Config_Xml $options
     * @return Ema_Model_EntityModel
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     * @return Ema_Model_EntityModel
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * Ema_Model_EntityModel constructor.
     * @param Zend_Registry $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function post($params)
    {
        // TODO: Implement post() method.
    }

    public function getCollection($params)
    {
        // TODO: Implement getCollection() method.
    }

    public function patch($id, $data)
    {
        // TODO: Implement patch() method.
    }

    public function patchCollection($idList, $data)
    {
        // TODO: Implement patchCollection() method.
    }

    public function put($id, $data)
    {
        // TODO: Implement put() method.
    }

    public function putCollection($idList, $data)
    {
        // TODO: Implement putCollection() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function deleteCollection($idList, $dryRun = true)
    {
        // TODO: Implement deleteCollection() method.
    }
}
