<?php

class Session
{
    private static $_instance = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance()
    {
        if (empty(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function start()
    {
        session_start();
    }

    public function authorize()
    {
        $_SESSION['authorize'] = true;
    }

    public function unauthorize()
    {
        $_SESSION['authorize'] = false;
    }

    public function isAuthorized()
    {
        return !empty($_SESSION['authorize']);
    }
}