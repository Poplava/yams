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
        session_set_cookie_params(604800);
        session_start();
    }

    /**
     * Function authorizes user
     */
    public function authorize($userId)
    {
        $_SESSION['userId'] = $userId;
    }

    /**
     * Function unauthorizes user
     */
    public function unauthorize()
    {
        if (isset($_SESSION['userId']))
        {
            unset($_SESSION['userId']);
        }
    }

    /**
     * Function checks authorize current user or not
     *
     * @return boolean authorized user or not
     */
    public function isAuthorized()
    {
        return !empty($_SESSION['userId']);
    }

    public function getUserId()
    {
        return $this->isAuthorized() ? $_SESSION['userId'] : null;
    }
}