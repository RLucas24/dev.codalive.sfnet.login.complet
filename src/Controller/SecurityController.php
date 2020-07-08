<?php

namespace App\Controller;

use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    public const LAST_EMAIL = 'app_login_form_last_email';
    /**
     * @Route("/login", name="app_login", methods={"POST","GET"})
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }
    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
        throw new LogicException("Error Processing Request");
        
    }
}
