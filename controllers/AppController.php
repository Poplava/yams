<?php

/**
 * App Controller for assets loading
**/
class AppController extends Controller
{
    public function run()
    {
        $assets = Config::get('assets');
        $this->view('app', $assets);
    }
}
