<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Bijou;
use App\Models\Order;


class PanierComponent extends Component
{
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
