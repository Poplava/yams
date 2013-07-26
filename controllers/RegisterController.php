<?php

class RegisterController extends Controller
{
    public function run($params = array())
    {
        $userId = User::create($params);
        die(json_encode(array('userId' => $userId)));
    }
}
