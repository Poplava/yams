<?php

class LoginController extends Controller
{
    public function run($params = array())
    {
        if($this->isPutRequest())
        {
            $this->response(array('result' => User::authorize($params)));
        }
        else
        {
            $assets = Config::get('assets');
            $this->view('app', $assets);
        }
    }
}