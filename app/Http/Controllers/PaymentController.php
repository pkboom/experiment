<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller
{
    public function create()
    {
        Stripe::setApiKey('sk_test_PuoSYH73If0yirAhwK7fBO9k');

        $paymentInetent = PaymentIntent::create([
          'amount' => 1099,
          'currency' => 'cad',
        ]);

        return Response::json([
            'clientSecret' => $paymentInetent->client_secret,
        ]);
    }
}
