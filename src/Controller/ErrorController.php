<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/404", name="error")
     */
    public function index()
    {
        return $this->render('404.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }
}
