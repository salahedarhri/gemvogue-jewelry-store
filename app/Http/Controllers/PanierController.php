<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Bijou;

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
            $quantity = $request->input('quantity');
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
}