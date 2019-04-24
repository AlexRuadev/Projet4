<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/404", name="error404")
     */
    public function error404()
    {
        return $this->render('404.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }

    /**
     * @Route("/403", name="error403")
     */
    public function error403()
    {
        return $this->render('403.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }
}
