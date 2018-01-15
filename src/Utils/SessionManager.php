<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 19:57
 */

namespace App\Utils;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Class Session
 * @package Utils
 */
class SessionManager
{
    /** @var UserManager $userManager */
    private $userManager;

    /** @var Session $session */
    private $session;

    /**
     * SessionManager constructor.
     * @param RequestStack $requestStack
     * @param UserManager $userManager
     */
    public function __construct(RequestStack $requestStack, UserManager $userManager)
    {
        $this->session = $requestStack->getCurrentRequest()->getSession();
        $this->userManager = $userManager;
    }

    public function session_start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return $this->session->has('auth');
    }

    /**
     * @return bool|null|array
     */
    public function getUser()
    {
        if ($this->isAuth()) {
            return $this->userManager->findOneByUsername($this->session->get('auth'));
        }

        return null;
    }

    /**
     * @param string $username
     * @return SessionManager
     */
    public function setAuth($username)
    {
        $this->session->set('auth', $username);

        return $this;
    }
}
