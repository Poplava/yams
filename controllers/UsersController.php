<?php

class UsersController extends Controller
{
    public function allowed($params = array())
    {
        return Session::getInstance()->isAuthorized();
    }

    public function post($params = array())
    {
        $userId = User::create($params);
        $this->response(array('userId' => $userId));
    }

    public function get($params)
    {
        $user = User::get($params);
        $this->response($user);
    }
}