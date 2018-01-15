<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 16:42
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction()
    {
        return $this->render('default/homepage.html.twig');
    }

    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->getSession()->set('auth', $request->request->get('username'));
        }

        return $this->render('default/login.html.twig');
    }

    private function isAuthenticated(Request $request)
    {
        $request->getSession()->set('auth', $request->request->get('username'));
    }
}