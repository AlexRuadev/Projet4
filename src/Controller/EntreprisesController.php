<?php

namespace App\Controller;

use App\Entity\Entreprises;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntreprisesController extends AbstractController
{
    /**
     * @Route("/profil-entreprise/{id}", name="entreprises")

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

		$nom = $entreprise->getEntreprisesNom();

        $data = array(
            'street'     => $entreprise->getEntreprisesAdresse(),
            'postalcode' => $entreprise->getEntreprisesCp(),
            'city'       => $entreprise->getEntreprisesVille(),
            'country'    => 'france',
            'format'     => 'json',
        );
        $url = 'https://nominatim.openstreetmap.org/?' . http_build_query($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mettre ici un user-agent adéquat');
        $geopos = curl_exec($ch);
        curl_close($ch);

        $json_data = json_decode($geopos, true);

        return $this->render('entreprises/profil_entreprise.html.twig', [
            'entreprise' => $entreprise,
	        'lat' => $json_data[0]['lat'],
	        'lon' => $json_data[0]['lon'],
	        'nom' => $nom
        ]);
    }
}
