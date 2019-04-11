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
     * @Route("/stripe", name="stripe")
     */
    public function payment()
    {
        \Stripe\Stripe::setApiKey("sk_test_gUMcR5A644I85YtgJj8Pr1P700iehIRShK");

        \Stripe\Charge::create([
          "amount" => 500,
          "currency" => "eur",
          "source" => "tok_amex", // obtained with Stripe.js
          "description" => "TEST PAIEMENT",
          "receipt_email" => "gauthier.guigz@gmail.com"
          ]);
          
          return $this->render('payment/stripe.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }
}