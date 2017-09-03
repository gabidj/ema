<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/3/2017
 * Time: 5:09 PM
 */
class Ema_Controller_EmaController
{
    protected $config;
    protected $registry;
    protected $arguments;

    public function __construct(Ema_ConfigProvider $config, $registry)
    {
        $this->config = $config();
        $this->registry = $registry;
        $this->arguments = $this->registry->arguments;
    }

    /**
     * @param array $data [optional] initial response
     * @return array
     */
    public function __invoke($data = []) : array
    {
        // Api_Model_Header::setHeaderByCode(501);
        $em = new Ema_Model_EntityModel($this->registry);
        $action = $this->registry->action;

        // support for GET-POST only requests
        $requestMethod = $action;



        switch ($action) {
            case 'ema':
                // auto-detect request method
                $requestMethod = $_SERVER['REQUEST_METHOD'];
            case 'get':
            case 'getCollection':
            case 'post':
            case 'put':
            case 'putCollection':
            case 'patch':
            case 'patchCollection':
            case 'delete':
            case 'deleteCollection':

                return $data;
        }
        return $data;
    }
}