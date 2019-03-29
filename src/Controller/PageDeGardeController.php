<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageDeGardeController extends AbstractController
{
    /**
     * @Route("/landing", name="landing")
     */
    public function index()
    {
        return $this->render('accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
