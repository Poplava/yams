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
    abstract public function run($params = array());

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
