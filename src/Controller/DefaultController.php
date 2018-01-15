<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 16:42
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}