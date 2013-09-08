<?php

class AuthController extends Controller
{
    public function allowed($params = array())
    {
        return !Session::getInstance()->isAuthorized();
    }

    public function put($params = array())
    {
        $result = User::authenticate($params);
        if (!empty($result) && isset($result['userId']))
        {
            Session::getInstance()->authorize($result['userId']);
            $this->response(array('result' => true));
        }

        $this->response(array('result' => false));
    }
}