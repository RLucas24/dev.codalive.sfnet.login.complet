<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render('home.html.twig');
    }


    /**
     * @Route("/help", name="app_help")
     */
    public function help()
    {
        return $this->render('home.html.twig');
    }
}
