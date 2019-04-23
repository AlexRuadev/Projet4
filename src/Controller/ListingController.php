<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprises;

class ListingController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {

    	$entreprises =  $this->getDoctrine()
		    ->getRepository(Entreprises::class);

    	$listeEntreprises = $entreprises->findBy(
			['Entreprises_status' => 1]
	    );


        return $this->render('listing/listing.html.twig', [
            'entreprises' => $listeEntreprises,
        ]);
    }
}
