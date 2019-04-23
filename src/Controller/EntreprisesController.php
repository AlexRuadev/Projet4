<?php

namespace App\Controller;

use App\Entity\Entreprises;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntreprisesController extends AbstractController
{
    /**
     * @Route("entreprises/profil-entreprise/{id}", name="entreprises")

     */
    public function index($id)
    {
	    $entreprise =  $this->getDoctrine()
		    ->getRepository(Entreprises::class)
		    ->find($id);

	    if(empty($entreprise)){
		    $this->redirect('404');
	    }

	    if($entreprise->getEntreprisesStatus() === FALSE){
	    	$this->redirect('404');
	    }

        return $this->render('entreprises/profil_entreprise.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
