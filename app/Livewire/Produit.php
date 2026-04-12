<?php

namespace App\Livewire;
use App\Models\Bijou;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;

class Produit extends Component{

    public $slug;

    public function mount($slug){

        $this->slug = $slug;
        $bijou = Bijou::where('slug', $this->slug)->first();
        if (!$bijou) {  abort(404); }

        //SEO using SSR
        SEOTools::setTitle( $bijou->nom );
        SEOTools::setDescription('Conçu avec des pierres précieuses et des métaux fins, '
            .$bijou->nom.' est parfait pour ajouter une touche de sophistication à votre style. 
            Commandez maintenant avec livraison rapide.');
        SEOTools::opengraph()->setUrl(env('APP_URL') . '/bijoux/' . $this->slug);
        SEOTools::setCanonical(env('APP_URL') . '/bijoux/' . $this->slug);
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::jsonLd()->addImage( asset('images/produits/compressed/'. $bijou->photo1 ));
    }

    public function ajouterProduit($id){
        $produit = Bijou::find($id);
        Cart::instance('cart')->add($produit->id,$produit->nom,1 ,$produit->prix)
                              ->associate('App\Models\Bijou');

        // Pour mettre à jour le Cart Icon
        $this->dispatch('produit-ajoute');

        $this->dispatch('toast', message: 'Bijou ajouté dans votre panier avec succès !', type: 'success');

    }

    public function render(){
        
        $bijou = Bijou::where('slug', $this->slug)->first();

        $bijouxSimilaires = Bijou::where('collection' , $bijou->collection )
        ->where( 'id' , '!=', $bijou->id)
        ->limit(8)
        ->get();

        return view('livewire.produit',[
            'bijou'=> $bijou,
            'bijouxSimilaires'=> $bijouxSimilaires,
        ])->extends('layouts.client')->section('content');
    }
}
