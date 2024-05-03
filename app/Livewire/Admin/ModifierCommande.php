<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Order;


class ModifierCommande extends Component
{
    #[Layout('layouts.admin')] 

    public $sessionId;
    public $prixTotal;
    public $status;
    public $idCommande;
    
    public function mount($id){

        $commande = Order::findOrFail($id);
        $this->idCommande = $id;
        $this->sessionId = $commande->session_id;
        $this->prixTotal = $commande->prix_total;
        $this->status = $commande->status;
    }

    public function ModifierCommande(){
        try{
            $commande = Order::findOrFail($this->idCommande);
            $commande->session_id = $this->sessionId;
            $commande->prix_total = $this->prixTotal;
            $commande->status = $this->status;
            $commande->save();
            session()->flash('success','La commande est modifié avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            dump( $e->getMessage());       
        }
    }
    public function render()
    {
        return view('livewire.admin.modifier-commande');
    }
}
