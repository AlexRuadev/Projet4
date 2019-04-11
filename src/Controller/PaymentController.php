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
        \Stripe\Stripe::setApiKey("sk_test_gUMcR5A644I85YtgJj8Pr1P700iehIRShK");

        \Stripe\Charge::create([
          "amount" => 500, // le montant en centimes
          "currency" => "eur", // la monnaie
          "source" => "tok_amex", // obtained with Stripe.js
          "description" => "TEST PAIEMENT", // description sur le paiement et contenu du mail recu a l'utilisateur
          "customer"=> "cus_AJ6rlf2taOsyXj", // ID du client qui envoie le paiement
          "on_behalf_of"=> null, // le compte stripe de l'entreprise qui recoit le paiement
          "receipt_email" => "mailutilisateur@gmail.com" // recu du paiement au mail du client
          ]);
          
          return $this->render('payment/paiement.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }
}