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

    public function put($params = array())
    {
        $success = User::update($params);
        $this->response(array('success' => $success));
    }

    public function get($params)
    {
        $user = User::get($params);
        $this->response($user);
    }
}