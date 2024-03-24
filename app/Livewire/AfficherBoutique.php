<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bijou;

class AfficherBoutique extends Component
{
    use WithPagination;

    public $bijoux;
    public $nbArticles = 12;
    public $categories = [];
    public $metaux = [];
    public $ordre='asc';
    public $prixMin;
    public $prixMax;

    public function mount(){
        $this->chargerBijoux();
    }

    public function ChargerPlus(){
        $this->nbArticles += 12;
        $this->chargerBijoux();
    }

    public function chargerBijoux(){

        $query = Bijou::query();

        if (!empty($this->categories)) {
            $query->whereIn('type', $this->categories);
        }

        if (!empty($this->metaux)) {
            $query->whereIn('type_metal', $this->metaux);
        }

        if($this->prixMin && $this->prixMax){
            $query->whereBetween('prix', [$this->prixMin,$this->prixMax]);
        }

        if($this->ordre){
            $query->orderBy('prix',$this->ordre);
        }

        $this->bijoux = $query->take($this->nbArticles)->get();
    }

    public function rangerPrix( $prixMin, $prixMax ){
        $this->prixMin = $prixMin;
        $this->prixMax = $prixMax;
        $this->chargerBijoux();
    }

    public function render(){

        $this->chargerBijoux();

        return view('livewire.afficher-boutique',[
            'bijoux' => $this->bijoux,
        ])->extends('layouts.client')->section('content');  
    }
}
