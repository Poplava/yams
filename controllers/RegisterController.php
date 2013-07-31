<?php

class RegisterController extends Controller
{
    public function allowed($params = array())
    {
        return Session::getInstance()->isAuthorized();
    }

    public function run($params = array())
    {
        if($this->isPostRequest())
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