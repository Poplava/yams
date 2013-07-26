<?php

/**
 * App Controller for assets loading
**/
class AppController extends Controller
{
    public function run($params = array())
    {
        $assets = Config::get('assets');
        $this->view('app', $assets);
    }
}
