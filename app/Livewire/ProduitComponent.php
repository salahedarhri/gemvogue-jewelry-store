<?php

namespace App\Livewire;
use App\Models\Bijou;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProduitComponent extends Component{

    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function ajouterProduit($id){
        $produit = Bijou::find($id);
        Cart::instance('cart')->add($produit->id,$produit->nom,1 ,$produit->prix)
                              ->associate('App\Models\Bijou');

        session()->flash('success','Bijou ajouté dans votre panier avec succès !');
    }

    public function render()
    {
        $bijou = Bijou::where('slug', $this->slug)->first();

        if (!$bijou) { abort(404); }

        $bijouxSimilaires = Bijou::where('collection' , $bijou->collection )
        ->where( 'id' , '!=', $bijou->id)
        ->limit(8)
        ->get();

        return view('livewire.produit-component',[
            'bijou'=> $bijou,
            'bijouxSimilaires'=> $bijouxSimilaires,
        ])->extends('layouts.client')->section('content');
    }
}
