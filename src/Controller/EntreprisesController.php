<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntreprisesController extends AbstractController
{
    /**
     * @Route("/profil-entreprise", name="entreprises")
     */
    public function index()
    {


        $data = array(
            'street'     => '3 rue des forgettes',
            'postalcode' => '76000',
            'city'       => 'Rouen',
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
            'controller_name' => 'EntreprisesController',
            'lat' => $json_data[0]['lat'],
            'lon' => $json_data[0]['lon']

        ]);
    }

}
