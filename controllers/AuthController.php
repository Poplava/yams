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
        if (!empty($result))
        {
            Session::getInstance()->authorize();
        }

        $this->response(array('result' => $result));
    }
}