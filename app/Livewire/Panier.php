<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\PanierService;
use App\Traits\GestionPanier;

// Panier.php
class Panier extends Component
{
    use GestionPanier;

    public function mount()
    {
        $this->initPanier();
    }

    public function render()
    {
        return view('livewire.panier')->extends('layouts.client')->section('content');
    }
}

