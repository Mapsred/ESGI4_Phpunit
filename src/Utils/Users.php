<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 15:12
 */

namespace Utils;


class Users
{
    /** @var array $users */
    private static $users = [
        [
            'username' => 'Toto',
            'password' => '1234'
        ],
    ];

    /**
     * @return array
     */
    public static function findAll(): array 
    {
        return self::$users;
    }

    /**
     * @param string $username
     * @return array|null
     */
    public static function findOneByUsername(string $username)
    {
        $key = array_search($username, array_column(self::$users, 'username'));

        return isset(self::$users[$key]) ? self::$users[$key] : null;
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function isUsernamePasswordValid(string $username, string $password)
    {
        if (null !== $user = self::findOneByUsername($username)) {
            return $user['password'] === $password;
        }
        
        return false;
    }


}