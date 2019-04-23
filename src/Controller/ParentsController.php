<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParentsController extends AbstractController
{
    /**
     * @Route("parents/profil-parent", name="profil-parent")
     */
    public function index()
    {
        return $this->render('parents/profil_parent.html.twig', [
            'controller_name' => 'ParentsController',
        ]);
    }
}
