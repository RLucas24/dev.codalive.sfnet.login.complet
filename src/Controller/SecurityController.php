<?php

namespace App\Controller;

use App\Form\UserRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    public const LAST_EMAIL = 'app_login_form_last_email';

    /**
     * @Route("/register", name="app_register", methods={"POST","GET"})
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(UserRegistrationFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $plainPassword = $form['plainPassword']->getData();
            $user->setPassword($passwordEncoder->encodePassword($user, $plainPassword));

            $em->Persist($user);
            $em->flush();

            $this->addFlash('success', 'User successfully created!');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('security/register.html.twig', 
    ['registrationForm'=>$form->createView()]);
    }
    
    /**
     * @Route("/login", name="app_login", methods={"POST","GET"})
     */
    public function login(): Response
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
