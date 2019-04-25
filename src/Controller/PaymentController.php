<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment", name="payment")
     */
    public function index()
    {
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }

    /**
     * @Route("/paiement", name="paiement")
     */
    public function payment()
    {
        \Stripe\Stripe::setApiKey("sk_test_0KnOrKNN7Nf9d7l6pyRkNZgd00FP5Aqi59");

        \Stripe\Charge::create([
            "currency" => "eur", // la monnaie
            "amount" => 14200, // le montant en centimes
            "source" => "tok_amex", // obtained with Stripe.js
            "description" => "Paiement d'une réservation sur Kidsery", // description sur le paiement et contenu du mail recu a l'utilisateur
            "receipt_email" => "nfactoryjean@outlook.com", // recu du paiement au mail du client
            //"customer"=> "cus_AJ6rlf2taOsyXj", // ID du client qui envoie le paiement
            //"on_behalf_of" => null, // le compte stripe de l'entreprise qui recoit le paiement
        ]);

        return $this->render('payment/paiement.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }
}
