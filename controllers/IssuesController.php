<?php

class IssuesController extends Controller
{
    public function run($params = array())
    {
        $assets = Config::get('assets');
        $this->view('app', $assets);
    }
}