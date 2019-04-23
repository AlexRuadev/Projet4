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

    	$id = 2;
    	$entreprises =  $this->getDoctrine()
		    ->getRepository(Entreprises::class)
		    ->find($id);

	    if (!$entreprises) {
		    throw $this->createNotFoundException(
			    'No product found for id '. $id
		    );
	    }


        return $this->render('listing/listing.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }
}
