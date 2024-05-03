<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Layout;

class AfficherMessage extends Component
{
    #[Layout('layouts.admin')] 
    public $nom = '';
    public $prenom = '';       
    public $email = '';       
    public $telephone = ''; 
    public $message = ''; 
    
    public function mount($id){
        $message = Message::find($id);
        $this->nom = $message->nom;
        $this->prenom = $message->prenom;        
        $this->email = $message->email;        
        $this->telephone = $message->telephone;        
        $this->message = $message->message;        
    }

    public function render()
    {
        return view('livewire.admin.afficher-message');
    }
}
