<?php

/**
 * User class - one of the main entities
**/
class User
{
    static $_salt = 'sh1239shgdfhgdfgnzxcd';

    /**
     * Function creates new user and returns its id
     *
     * @param $userData = array(
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
                    passwordHash    = :passwordHash,
                    firstName       = :firstName,
                    lastName        = :lastName,
                    registeredOn    = NOW()
            ",
            array(
                ':email'        => $userData['email'],
                ':passwordHash' => crypt($userData['password'], self::$_salt),
                ':firstName'    => $userData['firstName'],
                ':lastName'     => $userData['lastName'],
            )
        );

        return $db->lastInsertId();
    }

    /**
     * Function authenticates user and returns exists user or not.
     * Function tries to find user with given email and password.
     * First part of email also correct, and function tries to find
     * user only by first part of email(separated by @) and password.
     *
     * @param $loginData = array(
     *      'login'      => string,
     *      'password'   => string,
     * );
     *
     * @return boolean, true if user exists, false otherwise
    **/
    public static function authenticate($loginData)
    {
        $db = new DB();
        return (bool)$db->queryScalar("
                SELECT 1
                FROM user
                WHERE
                    (email = :email OR email LIKE :emailLogin) AND
                    passwordHash = :passwordHash
                ",
            array(
                ':email' => $loginData['login'],
                ':emailLogin' => $loginData['login'] . '@%',
                ':passwordHash' => crypt($loginData['password'], self::$_salt),
            )
        );
    }
}