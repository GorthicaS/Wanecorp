<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        // Mettez vos propres identifiants de client PayPal ici
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');

        $this->apiContext = new ApiContext(new OAuthTokenCredential($clientId, $clientSecret));
    }

    public function status(Request $request)
    {
        // Obtenez l'ID de paiement et le jeton de l'exécuteur de paiement à partir des paramètres de requête
        $paymentId = $request->get('paymentId');
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        // Exécutez le paiement
        $payment = Payment::get($paymentId, $this->apiContext);
        try {
            $payment->execute($execution, $this->apiContext);
        } catch (\Exception $ex) {
            // En cas d'erreur, vous pouvez afficher les informations d'erreur avec $ex->getData();
            die($ex);
        }

        // Mettez à jour votre commande ou effectuez les actions appropriées ici
        // Par exemple, vous pouvez vérifier le statut du paiement et mettre à jour votre commande en conséquence

        return view('payment.success');
    }
}
