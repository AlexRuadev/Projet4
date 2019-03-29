<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function viewConnection()
    {
        return $this->render('utilisateur/connexion.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }
}
