<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExceptionController extends AbstractController
{
    public function erreur403()
    {
        return $this->render('403.html.twig');
    }
}
