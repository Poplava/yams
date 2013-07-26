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
        spl_autoload_register(array($this, '_autoLoader'));
    }

    /**
     * Function performs autoloading
     *
     * @param $className - string
    **/
    protected function _autoLoader($className)
    {
        require_once("models/{$className}.php");
    } 

    /**
     * Function performs routing and other application things
    **/
    public function run()
    {
        //routing 
    }
}
