<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Bijou;
use App\Models\Order;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PanierController extends Controller{

    public function index(){

        $cartItems = Cart::instance('cart')->content();
        return view('panier',['cartItems'=>$cartItems ]);
    }

    public function addToCart(Request $request){

        $product = Bijou::find($request->id);
        Cart::instance('cart')->add($product->id,$product->nom,1 ,$product->prix)->associate('App\Models\Bijou');

        return redirect()->back()->with('success','Bijou ajouté dans votre panier avec succès !');
    }

    public function updateCart(Request $request, $rowId){

        $cart = Cart::instance('cart');
        $item = $cart->get($rowId);
    
        if ($item) {
            $rowId = $item->rowId;
            $quantity = (int)$request->input('quantity');
            
            $cart->update($rowId, $quantity);

            return redirect()->route('panier')->with('success', 'Quantité mise à jour avec succès !');
        }
    
        return redirect()->route('panier')->with('error', 'Article introuvable dans le panier.');
    }
    

    public function deleteItem($rowId){

        $cart = Cart::instance('cart');
        $item = $cart->get($rowId);

        if ($item) {
        Cart::remove($rowId);
        return redirect()->route('panier')->with('success', 'Bijou retirée du panier avec succès !');
        }

        return redirect()->route('panier')->with('error', 'Article introuvable dans le panier.');
    }   

    public function checkout(){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $produitsPanier = Cart::instance('cart')->content();

        $lineItems =[];

        foreach($produitsPanier as $produit){
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => $produit->name,
                        'images' => [$produit->model->photo1]   
                     ],
                    'unit_amount' => $produit->price * 100,],
                'quantity' => $produit->qty,
            ];
        }

         $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' =>route('cancel'),
            ]);

            $order = new Order();
            $order->status = 'Non payé';
            $order->session_id = $session->id;
            $order->save();
    
            return redirect($session->url);
        }

    public function success(Request $request){
        
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionId = $request->get('session_id');

        // try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }
            
            $client = \Stripe\Customer::retrieve($session->customer);

            $order = Order::where('session_id', $session->id)->first();

            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'Non payé') {
                $order->status = 'Payé';
                $order->save();
            }

            return view('checkout.success', compact('client'));
        // } catch (\Exception $e) {
        //     throw new NotFoundHttpException();
        // }

    }
} 