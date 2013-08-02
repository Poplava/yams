<?php

/**
 * Basic Controller class
**/
abstract class Controller
{
    private $_params = array();

    /**
     * Function runs controller
     *
     * @param $params - array of params
    **/
    final public function run($params = array())
    {
        $this->acl($params);
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if(method_exists($this, $method))
        {
            $this->$method($params);
        }
        else
        {
            header("HTTP/1.0 404 Not Found");
            die;
        }
    }

    /**
     * Function checks allowed current action
     * for current user or not.
     *
     * @param $params - array of params
    **/
    abstract public function allowed($params = array());

    /**
     * Function checks allowed current action
     * for current user or not and does
     * needed actions after check
     *
     * @param $params - array of params
    **/
    final public function acl($params = array())
    {
        if (!$this->allowed($params))
        {
            // redirect to some default page, as for authorized as
            // for unauthorized user
        }
    }

    /**
     * Function renders view from views/*
     *
     * @param $name - string, view name
     * @param $params - array of params passed to view
    **/
    public function view($name, $params)
    {
        $this->_params = $params;
        include("views/{$name}.php");
    }

    /**
     * Function gets params from $this->_params
     *
     * @param $name - string, param name
     *
     * @return string, param value
    **/
    public function __get($name)
    {
        return $this->_params[$name];
    }

    /**
     * Function sends json response to client
     *
     * @param $data - array
    **/
    public function response($data)
    {
        header('Content-type: application/json;charset=UTF-8');
        die(json_encode($data));
    }
}
