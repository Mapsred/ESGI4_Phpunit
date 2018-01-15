<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 15:08
 */

namespace Utils;

/**
 * Class Session
 * @package Utils
 */
class Session
{
    public static function session_start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function logged_only()
    {
        self::session_start();
        if (!self::isAuth()) {
            self::addFlash("danger", "Vous n'avez pas le droit d'accéder à cette page");
            $location = "/login.php";
            self::redirecting($location);
        }
    }

    /**
     * @param $type
     * @param $message
     */
    public static function addFlash($type, $message)
    {
        $_SESSION['flash'][$type] = $message;
    }

    /**
     * @return bool
     */
    public static function isAuth()
    {
        return isset($_SESSION['auth']);
    }

    public static function getFlashBag()
    {
        $flashs = self::FlashBagAction();

        foreach ($flashs as $key => $flash) {
            echo "<div class='alert alert-$key' role='alert'>$flash</div>";
        }
    }

    /**
     * @return array
     */
    public static function FlashBagAction()
    {
        $flashs = [];
        if (isset($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $key => $error) {
                $flashs[$key] = $error;
            }
            unset($_SESSION['flash']);
        }

        return $flashs;
    }

    /**
     * @param $length
     * @return string
     */
    public static function str_random($length)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";

        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    /**
     * @param $url
     * @param $time
     */
    public static function redirecting($url, $time = 0)
    {
        echo sprintf(
            '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="1;url=%1$s" />
    </head>
    <body>
    </body>
</html>',
            htmlspecialchars($url, $time, 'UTF-8')
        );
    }

    /**
     * @param $content
     */
    public static function JsonResponse($content)
    {
        echo json_encode($content);
    }

    /**
     * @return bool|null|array
     */
    public static function getUser()
    {
        if (isset($_SESSION['auth'])) {
            return Users::findOneByUsername($_SESSION['auth']);
        }

        return null;
    }

    /**
     * @param $username
     */
    public static function setAuth($username)
    {
        $_SESSION['auth'] = $username;
    }
}