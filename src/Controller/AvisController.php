<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="avis")
     */
    public function index()
    {
        return $this->render('avis/login.html.twig', [
            'controller_name' => 'AvisController',
        ]);
    }
}
