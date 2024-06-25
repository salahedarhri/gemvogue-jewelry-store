<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


class CommandeManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')] 

    public $search = '';
    public $ordreVariable = null;
    public $ordre = 'asc';

    public function SupprimerCommande($id){
        try{
            Order::find($id)->delete();
            session()->flash('success','Commande supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            dump($e->getMessage());
        }
    }

    public function sortBy($v){
        if($this->ordreVariable == $v){
            $this->ordre = $this->ordre === 'asc' ? 'desc':'asc';
        }else{
            $this->ordre = 'asc';
        }

        $this->ordreVariable = $v;
    }

    public function render()
    {
        $query = Order::where('session_id','like','%'.$this->search.'%')
                ->orWhere('status', 'like', '%'.$this->search.'%');

        if(!empty($this->ordreVariable)){
            $query->orderBy($this->ordreVariable,$this->ordre);
        }

        $commandes = $query->paginate(12);

        return view('livewire.admin.commande-management',[
            'commandes' => $commandes,
        ]);
    }
}
