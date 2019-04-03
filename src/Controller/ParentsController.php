<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParentsController extends AbstractController
{
    /**
     * @Route("/profil-parent", name="parents")
     */
    public function index()
    {
        return $this->render('parents/profil_parent.html.twig', [
            'controller_name' => 'ParentsController',
        ]);
    }
}
