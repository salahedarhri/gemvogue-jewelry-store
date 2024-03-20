<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bijou;

class AfficherBoutique extends Component
{
    use WithPagination;

    public $Categorie;
    public $PrixFourchette;
    public $prixMin;
    public $prixMax;

    public $parPage = 12;

    public function ChargerPlus(){
        $this->parPage += 10;
    }

    public function filtrerCategorie(){

    }

    public function filtrerPrixFourchette(){

    }

    public function filtrerPrix(){

    }

    public function render()
    {
        $bijoux = Bijou::paginate($this->parPage);

        return view('livewire.afficher-boutique',[
            'bijoux' => $bijoux,
        ])->extends('layouts.client')->section('content');  
    }
}
