<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bijou;
use Artesaos\SEOTools\Facades\SEOTools;

class Boutique extends Component
{
    public int $nbArticles = 12;
    public array $categories = [];
    public array $metaux = [];
    public ?string $fourchette = 'all';
    public string $ordre = 'asc';

    public function mount(?string $categorie = null)
    {
        SEOTools::setTitle('Boutique');
        SEOTools::setDescription('Explorez la boutique en ligne de GemVogue pour découvrir une sélection exclusive de bijoux raffinés. 
            Que vous cherchiez une bague élégante, un collier brillant, ou des boucles d\'oreilles sophistiquées, notre collection répond à toutes vos attentes.');
        SEOTools::opengraph()->setUrl(env('APP_URL') . '/boutique');
        SEOTools::setCanonical(env('APP_URL') . '/boutique');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage(asset('images/composants/bg-hero-2-1200w.jpg'));

        if ($categorie) {
            $this->categories[] = $categorie;
        }
    }

    public function ChargerPlus(): void
    {
        $this->nbArticles += 12;
    }

    // Resetters
    public function updatedCategories(): void { $this->nbArticles = 12; }
    public function updatedMetaux(): void     { $this->nbArticles = 12; }
    public function updatedFourchette(): void { $this->nbArticles = 12; }
    public function updatedOrdre(): void      { $this->nbArticles = 12; }

    private function chargerBijoux()
    {
        $query = Bijou::query();

        if (!empty($this->categories)) {
            $query->whereIn('type', $this->categories);
        }

        if (!empty($this->metaux)) {
            $query->whereIn('type_metal', $this->metaux);
        }

        if (!empty($this->fourchette) && $this->fourchette !== 'all') {
            [$min, $max] = explode(' - ', $this->fourchette);
            $query->whereBetween('prix', [(int) trim($min), (int) trim($max)]);
        }

        $query->orderBy('prix', $this->ordre);

        return $query->take($this->nbArticles)->get();
    }

    public function render()
    {
        return view('livewire.boutique', [
            'bijoux' => $this->chargerBijoux(),
        ])->extends('layouts.client')->section('content');
    }
}