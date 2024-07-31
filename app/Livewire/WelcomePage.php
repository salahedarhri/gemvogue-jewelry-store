<?php

namespace App\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;

class WelcomePage extends Component
{
    public function mount(){
        SEOTools::setTitle('Accueil');
        SEOTools::setDescription('Découvrez GemVogue, votre destination premium pour des bijoux exquis au Maroc. 
            Explorez notre collection de bagues, colliers, boucles d\'oreilles et bracelets ornés de pierres précieuses et de métaux raffinés. 
            Profitez de la livraison rapide et du paiement en ligne sécurisé.');
        SEOTools::opengraph()->setUrl( env('APP_URL') );
        SEOTools::setCanonical( env('APP_URL') );
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage( asset('images/composants/landing-redhead-1200w.png'));
    }

    public function render()
    {
        return view('livewire.welcome-page')->extends('layouts.client')->section('content');
    }
}
