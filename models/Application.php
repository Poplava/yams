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
            trigger_error(E_USER_WARNING, "There is no such model '$className'.");
        }
    }

    /**
     * Function performs routing and other application things
    **/
    public function run()
    {
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
        {
            require_once("controllers/AppController.php");
            $controller = new AppController();
            $controller->run();
        }
        else
        {
            $controller = trim($_SERVER['SCRIPT_URL'], '/');
            $controller = ucfirst($controller) . 'Controller';

            require_once("controllers/{$controller}.php");
            $controller = new $controller();
            $params = json_decode(file_get_contents('php://input'), 1);
            if(empty($params)) $params = $_REQUEST;

            $controller->run($params);
        }
    }
}
