<?php

class RegisterController extends Controller
{
    public function run($params = array())
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userId = User::create($params);
            $this->response(array('userId' => $userId));
        }
        else
        {
            $assets = Config::get('assets');
            $this->view('app', $assets);
        }
    }
}
