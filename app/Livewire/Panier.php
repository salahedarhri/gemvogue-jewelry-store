<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Artesaos\SEOTools\Facades\SEOTools;

class Panier extends Component
{

    public function mount()
    {
        SEOTools::setTitle('Panier');
        SEOTools::setDescription('Votre panier GemVogue est prêt ! Vérifiez vos bijoux sélectionnés avant de finaliser votre achat. 
            Profitez de notre processus de paiement sécurisé et de notre livraison rapide pour recevoir vos pièces précieuses directement chez vous.');
        SEOTools::opengraph()->setUrl(env('APP_URL') . '/panier');
        SEOTools::setCanonical(env('APP_URL') . '/panier');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage(asset('images/composants/bijoux-panier-800w.jpg'));
    }

    public function incrementerProduit(string $rowId)
    {
        $panier  = Cart::instance('cart');
        $produit = $panier->get($rowId);

        if ($produit) {
            $panier->update($rowId, (int) $produit->qty + 1);
            $this->dispatch('produit-ajoute');
            $this->dispatch('toast', message: 'Quantité mise à jour avec succès !', type: 'success');
        } else {
            $this->dispatch('toast', message: 'Article introuvable dans le panier.', type: 'error');
        }
    }

    public function decrementerProduit(string $rowId)
    {
        $panier  = Cart::instance('cart');
        $produit = $panier->get($rowId);

        if (!$produit) {
            $this->dispatch('toast', message: 'Article introuvable dans le panier.', type: 'error');
            return;
        }

        if ((int) $produit->qty <= 1) {
            $this->supprimerProduit($rowId);
            return;
        }

        $panier->update($rowId, (int) $produit->qty - 1);
        $this->dispatch('produit-retire');
        $this->dispatch('toast', message: 'Quantité mise à jour avec succès !', type: 'success');
    }

    public function supprimerProduit(string $rowId)
    {
        $panier  = Cart::instance('cart');
        $produit = $panier->get($rowId);

        if ($produit) {
            $panier->remove($rowId);
            $this->dispatch('produit-retire');
            $this->dispatch('toast', message: 'Bijou retiré du panier avec succès !', type: 'success');
        } else {
            $this->dispatch('toast', message: 'Article introuvable dans le panier.', type: 'error');
        }
    }

    public function viderPanier()
    {
        Cart::instance('cart')->destroy();
        $this->dispatch('produit-retire');
        $this->dispatch('toast', message: 'Panier vidé avec succès !', type: 'success');
    }

    public function render()
    {
        $produits  = Cart::instance('cart')->content();
        $qte_total = 0;

        foreach ($produits as $p) {
            $qte_total += $p->qty;
        }

        $livraison = $qte_total >= 3 ? 60.0 : 45.0;
        $subtotal  = (float) str_replace(',', '', Cart::instance('cart')->subtotal());
        $total     = $subtotal + $livraison;

        return view('livewire.panier', [
            'produits'  => $produits,
            'livraison' => $livraison,
            'total'     => $total,
            'qte_total' => $qte_total,
        ])->extends('layouts.client')->section('content');
    }
}


