<?php

/**
 * User class - one of the main entities
**/
class User
{
    /**
     * Function creates new user and returns its id
     *
     * @param $userData = array(
     *      'login'     => string,
     *      'password'  => string,
     *      'email'     => string,
     *      'lastName'  => string,
     *      'firstName' => string,
     * );
     *
     * @return int, id of user on success, 0 on failure
    **/
    public static function create($userData)
    {
        $db = new DB();
        $result = $db->execute("
                INSERT INTO user
                SET
                    email           = :email,
                    login           = :login,
                    passwordHash    = :passwordHash,
                    firstName       = :firstName,
                    lastName        = :lastName,
                    registeredOn    = NOW()
            ",
            array(
                ':email'        => $userData['email'],
                ':login'        => $userData['login'],
                ':passwordHash' => crypt($userData['password'], "sh1239shgdfhgdfgnzxcd"),
                ':firstName'    => $userData['firstName'],
                ':lastName'     => $userData['lastName'],
            )
        );

        return $db->lastInsertId();
    }

    public function get($userIds)
    {
    }
}
