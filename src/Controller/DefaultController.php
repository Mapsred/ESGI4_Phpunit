<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 16:42
 */

namespace App\Controller;

use App\Utils\SessionManager;
use App\Utils\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
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

            $isUsernamePasswordValid = $this->get(UserManager::class)->isUsernamePasswordValid(
                $request->request->get('username'), $request->request->get('password')
            );

            if ($isUsernamePasswordValid) {
                $this->get(SessionManager::class)->setAuth($request->request->get('username'));
                $this->addFlash('success', 'Vous êtes maintenant connectés');

                return $this->redirectToRoute('content');
            } else {
                $this->addFlash('danger', 'Vos identifiants sont invalides');

                return $this->redirectToRoute('login');
            }
        }

        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/content", name="content")
     * @param Request $request
     * @return Response
     */
    public function contentAction(Request $request)
    {
        if (!$this->isAuthenticated($request)) {
            throw new UnauthorizedHttpException("User not logged in");
        }

        return $this->render('default/content.html.twig', [
            'user' => $this->get(SessionManager::class)->getUser()
        ]);
    }

    /**
     * @param Request $request
     */
    private function isAuthenticated(Request $request)
    {
        $request->getSession()->has('auth');
    }
}