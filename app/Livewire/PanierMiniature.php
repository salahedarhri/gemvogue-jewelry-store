<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

// Panier.php
class PanierMiniature extends Component
{
    protected $listeners = ['produit-ajoute' => '$refresh', 'produit-retire' => '$refresh'];

    public function render()
    {
        return view('livewire.panier-miniature', [
            'count' => Cart::instance('cart')->content()->sum('qty')
        ]);
    }
}

