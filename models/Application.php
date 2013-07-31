<?php

/**
 * Main class of Application
 * performs autoloading, routing, e.g.
**/
class Application
{
    /**
     * Function registers autoloader and other init things
    **/
    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        ini_set('html_errors', 'on');

        spl_autoload_register(array($this, '_autoLoader'));

        Session::getInstance()->start();
    }

    /**
     * Function performs autoloading
     *
     * @param $className - string
    **/
    protected function _autoLoader($className)
    {
        $fileName = "models/{$className}.php";
        if(is_file($fileName))
        {
            require_once($fileName);
        }
        else
        {
            //@TODO errors handling
        }
    } 

    /**
     * Function performs routing and other application things
    **/
    public function run()
    {
        $controller = trim($_SERVER['REQUEST_URI'], '/');
        if(empty($controller)) $controller = 'app';
        $controller = ucfirst($controller) . 'Controller';

        require_once("controllers/{$controller}.php");
        $params = json_decode(file_get_contents('php://input'), 1);
        $controller = new $controller();
        $controller->acl($params);
        $controller->run($params);
    }
}
