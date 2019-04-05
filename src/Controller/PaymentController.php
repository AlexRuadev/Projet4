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
    public function payment(Request $request)
    {
        \Stripe\Stripe::setApiKey("sk_test_gUMcR5A644I85YtgJj8Pr1P700iehIRShK");

        \Stripe\Charge::create([
        "amount" => 2000,
        "currency" => "eur",
        "source" => $request->request->get('stripeToken'), // obtained with Stripe.js
        "description" => "paiement de test"
        ]);

        return $this->render('payment/stripe.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }
}
