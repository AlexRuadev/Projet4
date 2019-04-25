<?php

namespace App\Controller;

use App\Entity\Parents;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParentsController extends AbstractController
{
    /**
     * @Route("/profil-parent/{id}", name="parents")
     */
    public function index()
    {
        $user = $this->getUser();

        if(empty($user)){
            $this->redirect('403');
        }

        return $this->render('parents/profil_parent.html.twig', [
            'controller_name' => 'ParentsController',
            'parent' => $user,
        ]);
    }
}
