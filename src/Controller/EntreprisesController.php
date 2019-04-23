<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntreprisesController extends AbstractController
{
    /**
     * @Route("entreprises/profil-entreprise", name="entreprises")
     */
    public function index()
    {
        return $this->render('entreprises/profil_entreprise.html.twig', [
            'controller_name' => 'EntreprisesController',
        ]);
    }
}
