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
    public $fourchette;
    public $ordre='asc';
    public $charger = true;

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

        if(!empty($this->fourchette)){
            [$min, $max] = explode('-', $this->fourchette);
            $query->whereBetween('prix', [$min, $max]);
        }

        if($this->ordre){
            $query->orderBy('prix',$this->ordre);
        }

        $this->bijoux = $query->take($this->nbArticles)->get();

        if( count($this->bijoux) < $this->nbArticles ){
            $this->charger = false;
        }
    }

    public function effacerCategorie($categorie){
        $this->nbArticles = 12;
        $this->categories = array_diff($this->categories, [$categorie]);
        $this->chargerBijoux();
    }

    public function effacerMetal($metal){
        $this->nbArticles = 12;
        $this->metaux = array_diff($this->metaux, [$metal]);
        $this->chargerBijoux();
    }

    public function effacerFourchette(){
        $this->nbArticles = 12;
        $this->fourchette = null;
        $this->chargerBijoux();
    }

    public function render(){

        $this->chargerBijoux();

        return view('livewire.afficher-boutique',[
            'bijoux' => $this->bijoux,
            'charger' => $this->charger,
            'fourchette' => $this->fourchette,
        ])->extends('layouts.client')->section('content');  
    }
}
