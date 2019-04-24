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
    public function index($id)
    {
        $parents =  $this->getDoctrine()
            ->getRepository(Parents::class)
            ->find($id);
        return $this->render('parents/profil_parent.html.twig', [
            'controller_name' => 'ParentsController',
            'entreprise' => $parents,
        ]);
    }
}
