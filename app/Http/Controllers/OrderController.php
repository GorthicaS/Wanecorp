<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class OrderController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')  // ClientSecret
            )
        );
    }
    

    public function store(Request $request)
    {
        $order = new Order;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->address = $request->address;
        $order->size = $request->size;
        $order->pseudo_front = $request->pseudo_front;
        $order->pseudo_back = $request->pseudo_back;
        $order->quantity = $request->quantity;
    
        $order->save();
    
        // Stockez le prix total dans la session
        $unitPrice = 60;
        $totalPrice = $unitPrice * $order->quantity;
        $request->session()->put('totalPrice', $totalPrice);
    
        // Redirige vers la page de récapitulatif de la commande après l'enregistrement
        return redirect()->route('order.show', ['order' => $order->id]);
    }
    
    

    public function show(Order $order)
    {
        // Calculer le prix total
        $totalPrice = session()->get('totalPrice');

        // retourne simplement la vue avec l'ordre et le prix total
        return view('order', ['order' => $order, 'totalPrice' => $totalPrice]);
    }

    public function pay(Order $order, Request $request)
    {
        // Récupérer le prix total depuis la session
        $totalPrice = $request->session()->get('totalPrice');
    
        // Calculer la quantité en fonction du prix total et du prix unitaire de chaque produit
        $unitPrice = 60;
        $quantity = $totalPrice / $unitPrice;
    
        // Créer un nouvel objet Payer et définir le mode de paiement
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        
        // Définir l'objet Item avec les détails de l'article
        $item = new Item();
        $item->setName('Order ' . $order->id)
            ->setCurrency('EUR')
            ->setQuantity($quantity)
            ->setPrice($unitPrice); // Utiliser le prix unitaire
        
        // Créer un objet ItemList et y ajouter l'objet Item
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        
        // Définir les détails de l'objet Amount avec le prix total de l'article
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($totalPrice); // Utiliser le prix total récupéré depuis la session
        // Créer un objet Transaction et y ajouter les détails de l'objet Amount et de l'objet ItemList
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Your transaction description')
            ->setInvoiceNumber(uniqid());
        
        // Créer un objet RedirectUrls et définir les URL de retour et d'annulation
        $redirectUrls = new RedirectUrls(); 
        $redirectUrls->setReturnUrl(route('payment.status'))
            ->setCancelUrl(route('payment.status'));
        
        // Créer un objet Payment et y ajouter les objets Transaction, RedirectUrls et Payer
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        
        try {
            // Créer le paiement et obtenir l'URL d'approbation
            $payment->create($this->apiContext);
        
            // Obtenir l'URL d'approbation du paiement
            $approvalUrl = $payment->getApprovalLink();
        
            // Rediriger l'utilisateur vers l'URL d'approbation
            return redirect($approvalUrl);
        
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // En cas d'erreur, vous pouvez afficher les informations d'erreur avec $ex->getData();
            return back()->withErrors(['error' => $ex->getData()]);
        }
    }
    
}

