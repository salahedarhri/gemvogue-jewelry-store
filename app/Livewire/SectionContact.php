<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;

class SectionContact extends Component
{
    public $nomContact;
    public $prenomContact;
    public $emailContact;
    public $msgContact;
    public $numTelContact;

    protected $rules = [
        'prenomContact'=>'required',
        'nomContact'=>'required',
        'emailContact'=>'required|email',
        'msgContact'=>'required',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',
    ];

    public function validerContact(){
        $this->validate( $this->rules, $this->message );

        $message = new Message;
        $message->nom = trim($this->nomContact);
        $message->prenom = trim($this->prenomContact);
        $message->email = trim($this->emailContact);
        $message->message = trim($this->msgContact);

        if( !empty($this->numTelContact)){
            $message->telephone = trim($this->numTelContact);
        }

        $message->save();
        $this->resetMessage();
        
        session()->flash('message', 'Votre message a été envoyé avec succès!');
    }

    public function resetMessage(){
        $this->nomContact = '';
        $this->prenomContact = '';
        $this->emailContact = '';
        $this->msgContact = '';
        $this->numTelContact = '';
    }

    public function render()
    {
        return view('livewire.section-contact');
    }
}
