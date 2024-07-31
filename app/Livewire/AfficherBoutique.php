<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bijou;
use Artesaos\SEOTools\Facades\SEOTools;

class AfficherBoutique extends Component
{
    use WithPagination;
    public $bijoux;
    public $nbArticles = 12;
    public $categories = [];
    public $metaux = [];
    public $fourchette;
    public $ordre='asc';

    public function mount($categorie = null){

        SEOTools::setTitle('Boutique');
        SEOTools::setDescription('Explorez la boutique en ligne de GemVogue pour découvrir une sélection exclusive de bijoux raffinés. 
            Que vous cherchiez une bague élégante, un collier brillant, ou des boucles d\'oreilles sophistiquées, notre collection répond à toutes vos attentes.');
        SEOTools::opengraph()->setUrl( env('APP_URL').'/boutique' );
        SEOTools::setCanonical( env('APP_URL').'/boutique'  );
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage( asset('images/composants/bg-hero-2-1200w.jpg'));
    
        if($categorie){
            $this->categories[] = $categorie;   }
    }

    public function ChargerPlus(){
        $this->nbArticles += 12;
    }

    public function chargerBijoux(){

        $query = Bijou::query();

        if (!empty($this->categories)) {
            $query->whereIn('type', $this->categories);
        }

        if (!empty($this->metaux)) {
            $query->whereIn('type_metal', $this->metaux);
        }

        if(!empty($this->fourchette) && $this->fourchette !== 'all'){
            [$min, $max] = explode('-', $this->fourchette);
            $query->whereBetween('prix', [$min, $max]);
        }

        if($this->ordre){
            $query->orderBy('prix',$this->ordre);
        }

        $this->bijoux = $query->take($this->nbArticles)->get();
    }

    public function render(){

        $this->chargerBijoux();

        return view('livewire.afficher-boutique',[
            'categories' =>$this->categories,
            'bijoux' => $this->bijoux,
            'fourchette' => $this->fourchette,
        ])->extends('layouts.client')->section('content');  
    }
}