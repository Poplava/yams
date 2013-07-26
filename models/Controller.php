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
    abstract public function run($params);

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
}
