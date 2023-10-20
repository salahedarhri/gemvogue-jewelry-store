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
        $price = $product->prix;
        Cart::instance('cart')->add($product->id,$product->nom, 1 , $product->prix)->associate('App\Models\Bijou');
        
        return redirect()->back()->with('success','Bijou ajouté avec succès !');
    }

    // Store Action
    public function store(Request $request){

        
    }

    // Show Action
    public function show(){

        
    }

    // Edit Action
    public function edit(){

        
    }

    // Update Action
    public function update(Request $request){

        
    }

    // Destroy Action
    public function destroy(){

        
    
}

}
