<?php

namespace App\Traits;

use App\Models\Bijou;

trait GestionPanier
{
    public $items = [];
    public $total = 0;

    public function initPanier()
    {
        $this->items = session()->get('panier', []);
        $this->calculerTotal();
    }

    public function ajouterAuPanier(int $bijouId)
    {
        $bijou = Bijou::find($bijouId);
        if (!$bijou) return;

        $panier = session()->get('panier', []);

        $quantiteActuelle = $panier[$bijouId]['quantite'] ?? 0;
        if ($quantiteActuelle >= $bijou->qte_stock) {
            $this->dispatch('stock-insuffisant');
            return;
        }

        if (isset($panier[$bijouId])) {
            $panier[$bijouId]['quantite']++;
        } else {
            $panier[$bijouId] = [
                'nom'        => $bijou->nom,
                'prix'       => $bijou->prix,
                'type'       => $bijou->type,
                'type_metal' => $bijou->type_metal,
                'quantite'   => 1,
            ];
        }

        session()->put('panier', $panier);
        $this->items = $panier;
        $this->calculerTotal();
        $this->dispatch('bijou-ajoute');
    }

    public function retirerDuPanier(int $bijouId)
    {
        $panier = session()->get('panier', []);
        unset($panier[$bijouId]);
        session()->put('panier', $panier);
        $this->items = $panier;
        $this->calculerTotal();
    }

    public function mettreAJourQuantite(int $bijouId, int $quantite)
    {
        $bijou  = Bijou::find($bijouId);
        $panier = session()->get('panier', []);

        if ($quantite <= 0) {
            unset($panier[$bijouId]);
        } elseif ($bijou && $quantite > $bijou->qte_stock) {
            $panier[$bijouId]['quantite'] = $bijou->qte_stock;
        } else {
            $panier[$bijouId]['quantite'] = $quantite;
        }

        session()->put('panier', $panier);
        $this->items = $panier;
        $this->calculerTotal();
    }

        // Dans ton composant (ou trait)
    public function incrementer(int $bijouId){
        $this->mettreAJourQuantite($bijouId, ($this->items[$bijouId]['quantite'] ?? 0) + 1);
    }

    public function decrementer(int $bijouId){
        $this->mettreAJourQuantite($bijouId, ($this->items[$bijouId]['quantite'] ?? 0) - 1);
    }

    public function viderLePanier(){
        session()->forget('panier');
        $this->items = [];
        $this->total = 0;
    }

    private function calculerTotal()
    {
        $this->total = collect($this->items)
            ->sum(fn($item) => $item['prix'] * $item['quantite']);
    }
}