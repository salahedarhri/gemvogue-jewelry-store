<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Bijou;
use App\Models\Order;
use Artesaos\SEOTools\Facades\SEOTools;

class PanierComponent extends Component
{
    public function mount(){

        SEOTools::setTitle('Panier');
        SEOTools::setDescription('Votre panier GemVogue est prêt ! Vérifiez vos bijoux sélectionnés avant de finaliser votre achat. 
            Profitez de notre processus de paiement sécurisé et de notre livraison rapide pour recevoir vos pièces précieuses directement chez vous.');
        SEOTools::opengraph()->setUrl( env('APP_URL').'/panier' );
        SEOTools::setCanonical( env('APP_URL').'/panier'  );
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage( asset('images/composants/bijoux-panier-800w.jpg'));
    }

    public function incrementerProduit( $rowId ){
        $panier = Cart::instance('cart');
        $produit = $panier->get($rowId);

        if($produit){
            $qte = (int)$produit->qty;
            ++$qte;
            $panier->update($rowId, $qte);
            session()->flash('success', 'Quantité mise à jour avec succès !');
        }else{
            session()->flash('error', 'Article introuvable dans le panier.');
        }
    }

    public function decrementerProduit( $rowId ){
        $panier = Cart::instance('cart');
        $produit = $panier->get($rowId);

        if($produit){
            $qte = (int)$produit->qty;
            --$qte;
            $panier->update($rowId, $qte);
            session()->flash('success', 'Quantité mise à jour avec succès !');
        }else{
            session()->flash('error', 'Article introuvable dans le panier.');
        }
    }

    public function retirerProduit( $rowId ){
        $panier = Cart::instance('cart');
        $produit = $panier->get($rowId);

        if ($produit) {
        Cart::remove($rowId);
        session()->flash('success', 'Bijou retirée du panier avec succès !');
        }else{
            session()->flash('error', 'Article introuvable dans le panier.');
        }
    }


    public function render(){

        $produits = Cart::instance('cart')->content();
        $qte_total = 0;

        foreach( $produits as $p){ $qte_total += $p->qty; }

        if($qte_total >= 3){ $livraison=(float)60; }else{ $livraison=(float)45;}

        $subtotal = (float) str_replace(',', '', Cart::instance('cart')->subtotal());  
        $total = $subtotal + $livraison;

        return view('livewire.panier-component',[
            'produits' => $produits,
            'livraison' => $livraison,
            'total' => $total,
            'qte_total' => $qte_total,
        ])->extends('layouts.client')->section('content');
    }
}
