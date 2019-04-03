<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParentsController extends AbstractController
{
    /**
     * @Route("/parents", name="parents")
     */
    public function index()
    {
        return $this->render('parents/index.html.twig', [
            'controller_name' => 'ParentsController',
        ]);
    }
}
