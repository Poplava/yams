<?php

class Session
{
    /*  singleton instance of Session */
    private static $_instance = null;

    /* for prevent create multiple instances of class */
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    /**
     * Function returns singleton object of Session
     */
    public static function getInstance()
    {
        if (empty(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Function stats session
     */
    public function start()
    {
        session_start();
    }

    /**
     * Function authorizes user
     */
    public function authorize()
    {
        $_SESSION['authorize'] = true;
    }

    /**
     * Function unauthorizes user
     */
    public function unauthorize()
    {
        $_SESSION['authorize'] = false;
    }

    /**
     * Function checks authorize current user or not
     *
     * @return boolean authorized user or not
     */
    public function isAuthorized()
    {
        return !empty($_SESSION['authorize']);
    }
}