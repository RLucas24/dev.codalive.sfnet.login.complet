<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class SecretsController extends AbstractController
{
    /**
     * @Route("/secrets", name="app_secrets_index")
     * @IsGranted("ROLE_USER")
     */
    public function index()
    {
        return $this->render('secrets/index.html.twig');
    }
}
