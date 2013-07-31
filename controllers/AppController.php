<?php

/**
 * App Controller for assets loading
**/
class AppController extends Controller
{
    public function allowed($params = array())
    {
        return true;
    }

    public function run($params = array())
    {
        $assets = Config::get('assets');
        $this->view('app', $assets);
    }
}
