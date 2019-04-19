<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EnfantsController extends AbstractController
{
    /**
     * @Route("/profil-enfant", name="enfants")
     */
    public function index()
    {
        return $this->render('enfants/profil_enfant.html.twig', [
            'controller_name' => 'EnfantsController',
        ]);
    }
}
