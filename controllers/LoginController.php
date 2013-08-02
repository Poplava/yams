<?php

class LoginController extends Controller
{
    public function allowed($params = array())
    {
        return !Session::getInstance()->isAuthorized();
    }

    public function run($params = array())
    {
        if($this->isPutRequest())
        {
            $result = User::authenticate($params);
            if (!empty($result))
            {
                Session::getInstance()->authorize();
            }

            $this->response(array('result' => $result));
        }
        else
        {
            $assets = Config::get('assets');
            $this->view('app', $assets);
        }
    }
}