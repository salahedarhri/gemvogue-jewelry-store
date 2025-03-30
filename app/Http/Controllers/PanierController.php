<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Log;
use App\Models\Bijou;
use App\Models\Order;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PanierController extends Controller{

    public function addToCart(Request $request){

        $product = Bijou::find($request->id);
        Cart::instance('cart')->add($product->id,$product->nom,1 ,$product->prix)
                              ->associate('App\Models\Bijou');

        return redirect()->back()->with('success','Bijou ajouté dans votre panier avec succès !');
    }

    public function checkout(){

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $produitsPanier = Cart::instance('cart')->content();

        $prixTotal = 0;
        $qteTotal = 0;

        $lineItems =[];

        foreach($produitsPanier as $produit){

            $prixTotal += $produit->price;
            $qteTotal += $produit->qty;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => $produit->name,
                        //'images' => [ asset('images/produits/compressed/'. $produit->model->photo1)],
                     ],
                    'unit_amount' => $produit->price * 100,],
                'quantity' => $produit->qty,
            ];
        }

        if($qteTotal >= 3){
            $livraison = 60;
        }else{
            $livraison = 45;
        }

        $lineItems[] = [
            'price_data' => [
                'currency' => 'mad',
                'product_data' => [
                    'name' => 'Frais de livraison (Partout au Maroc)',
                ],
                'unit_amount' => $livraison * 100,
            ],
            'quantity' => 1,
        ];

         $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success',[],true ) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('cancel'),
            ]);

            // Créer la commande 
            $order = new Order();

            $order->status = 'Non payé';
            $order->prix_total = $prixTotal;
            $order->session_id = $session->id;
            $order->save();
    
            return redirect($session->url);
    }
        
    public function success(Request $request){

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $sessionId = $request->get('session_id');

        // Données de la session en fonction du session_id
        $session = \Stripe\Checkout\Session::retrieve($sessionId);  

        //Détails du client ( address->country , email, name)
        $client = $session->customer_details;

        $produits = $session->allLineItems($sessionId,null,null);

        $descriptions = collect($produits)->pluck('description')->unique()->toArray();

        $order = Order::where('session_id', $sessionId)->first();

        if ($order->status === 'Non payé') {
            $order->status = 'Payé';
            $order->save(); 
        }

        Cart::instance('cart')->store($client->name);
        Cart::instance('cart')->destroy();

        return view('checkout.success',compact('order','client'));

    }
        
    public function cancel(){

        return redirect()->route('panier')->with('error','Paiement annulé.');
    }

    // public function index(){
    //     $cartItems = Cart::instance('cart')->content();

    //     if($cartItems->count() >= 3){
    //         $livraison = (float)60;
    //     }else{
    //         $livraison = (float)45;
    //     }

    //     $subtotal = (float) str_replace(',', '', Cart::instance('cart')->subtotal());  
    //     $total = $subtotal + $livraison;

    //     return view('panier',['cartItems'=>$cartItems ],compact('livraison','total'));
    // }

    // public function updateCart(Request $request, $rowId){

    //     $cart = Cart::instance('cart');
    //     $item = $cart->get($rowId);
    
    //     if ($item) {
    //         $rowId = $item->rowId;
    //         $quantity = (int)$request->input('quantity');
            
    //         $cart->update($rowId, $quantity);

    //         return redirect()->route('panier')->with('success', 'Quantité mise à jour avec succès !');
    //     }
    
    //     return redirect()->route('panier')->with('error', 'Article introuvable dans le panier.');
    // }

    // public function deleteItem($rowId){

    //     $cart = Cart::instance('cart');
    //     $item = $cart->get($rowId);

    //     if ($item) {
    //     Cart::remove($rowId);
    //     return redirect()->route('panier')->with('success', 'Bijou retirée du panier avec succès !');
    //     }

    //     return redirect()->route('panier')->with('error', 'Article introuvable dans le panier.');
    // }   

    // public function success(Request $request){
        
    //     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $sessionId = $request->get('session_id');
    //     try {
    //         $session = \Stripe\Checkout\Session::retrieve($sessionId);

    //         if(!$session){  throw new NotFoundHttpException; }
            
    //         // $client = \Stripe\Customer::retrieve($session->customer);

    //         // $order = Order::where('session_id', $session->id)->first();

    //         // if (!$order) {
    //         //     throw new NotFoundHttpException();}

    //         // if ($order->status === 'Non payé') {
    //         //     $order->status = 'Payé';
    //         //     $order->save(); }

    //         return view('checkout.success', compact('client'));

    //     } catch (\Exception $e) {
            
    //         throw new NotFoundHttpException();
    //     }
    // }
} 