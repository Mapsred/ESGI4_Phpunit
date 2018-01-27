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
     * @return Response
     */
    public function contentAction()
    {
        if (!$this->isAuthenticated()) {
            throw new UnauthorizedHttpException("User not logged in");
        }

        return $this->render('default/content.html.twig', [
            'user' => $this->get(SessionManager::class)->getUser()
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        if (!$this->isAuthenticated()) {
            throw new UnauthorizedHttpException("User not logged in");
        }

        $this->get(SessionManager::class)->unAuth();

        return $this->redirectToRoute("homepage");
    }

    /**
     * @return bool
     */
    private function isAuthenticated()
    {
        return $this->get(SessionManager::class)->isAuth();
    }
}