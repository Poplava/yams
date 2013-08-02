<?php

/**
 * User class - one of the main entities
**/
class User
{
    static $_passwordSalt = 'sh1239shgdfhgdfgnzxcd';

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
                ':passwordHash' => crypt($userData['password'], self::$_passwordSalt),
                ':firstName'    => $userData['firstName'],
                ':lastName'     => $userData['lastName'],
            )
        );

        return $db->lastInsertId();
    }

    /**
     * Function updates user by params
     *
     * @param $params - array
     *      'password'  => string,
     *      'email'     => string,
     *      'lastName'  => string,
     *      'firstName' => string,
     * );
     *
     * @return true on success, false otherwise
    **/
    static public function update($params)
    {
        $userId = $params['userId'];
        unset($params['userId']);

        $parts = $bindParams = [];
        if(isset($params['password']))
        {
            $parts[] = "passwordHash = :passwordHash";
            $bindParams[':passwordHash'] = crypt($params['password']);
            unset($params['password']);
        }

        $bindParams[':userId'] = $userId;
        foreach($params as $key => $value)
        {
            $parts[] = "$key = :$key";
            $bindParams[":$key"] = $value;
        }

        $db = new DB();
        $count = $db->execute("
            UPDATE user
            SET " . implode(",\n", $parts) . "
            WHERE userId = :userId
            ",
            $bindParams
        );

        return $count > 0;
    }

    /**
     * Function gets user data by id and other params
     *
     * @param $params = array(
     *      'userId' => int,
     * );
     *
     * @param $params - array
     *      'email'     => string,
     *      'lastName'  => string,
     *      'firstName' => string,
     *      ...
     * );

    **/
    public static function get($params)
    {
        $db = new DB();
        $user = $db->queryRow("
            SELECT
                roleId,
                email,
                firstName,
                lastName,
                karma,
                avatarFile,
                registeredOn
            FROM user
            WHERE
                userId = :userId
            ",
            array(
                ':userId' => $params['userId'],
            )
        );

        return $user;
    }

    /**
     * Function authenticates user and returns exists user or not.
     * It tries to find user with given email and password.
     * First part of email also correct, and tries to find
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
                ':passwordHash' => crypt($loginData['password'], self::$_passwordSalt),
            )
        );
    }
}