<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityEntrController extends AbstractController
{
    /**
     * @Route("/entreprises/loginentr", name="app_loginentr")
     */
    public function loginentr(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security_entr/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);

    }

    /**
     * @Route("/logoutentr", name="app_logoutentr", methods={"GET"})
     */
    public function logout()
    {
//        throw new \Exception('Will be intercepted before getting here');
        return $this->render('home');
    }
}
