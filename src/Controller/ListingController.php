<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    /**
     * @Route("/listing", name="listing")
     */
    public function index()
    {
        return $this->render('listing/index.html.twig', [
            'controller_name' => 'ListingController',
        ]);
    }
}
