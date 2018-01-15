<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 19:30
 */

namespace App\Utils;


class UserManager
{
    /** @var array $users */
    private $users = [
        [
            'username' => 'Toto',
            'password' => '1234'
        ],
    ];

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->users;
    }

    /**
     * @param string $username
     * @return array|null
     */
    public function findOneByUsername(string $username)
    {
        $key = array_search($username, array_column($this->users, 'username'));

        return isset($this->users[$key]) ? $this->users[$key] : null;
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function isUsernamePasswordValid(string $username, string $password)
    {
        if (null !== $user = $this->findOneByUsername($username)) {
            return $user['password'] === $password;
        }

        return false;
    }

}