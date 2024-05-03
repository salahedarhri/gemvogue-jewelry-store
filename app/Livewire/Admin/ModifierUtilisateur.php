<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModifierUtilisateur extends Component
{
    #[Layout('layouts.admin')] 
    public $nomUtilisateur;
    public $emailUtilisateur;
    public $mdpUtilisateur;
    public $mdpUtilisateur_confirmation;
    public $idUtilisateur;

    protected $rulesNameEmail = [
        'nomUtilisateur' => 'string|max:255',
        'emailUtilisateur' => 'string|email|max:255',
    ];
    protected $messageNameEmail = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',
        'max' => 'La valeur ne doit pas dépasser :max caractères.',
        'string' => 'La valeur doit être une chaîne de caractères.',
    ];
    protected $rulesPassword = [
        'mdpUtilisateur' => 'min:6|confirmed',
    ];
    protected $messagePassword = [
        'min' => 'La valeur doit contenir au moins :min caractères.',
        'confirmed' => 'La confirmation ne correspond pas.',
    ];

    public function mount($id){
        $utilisateur = User::find($id);
        $this->idUtilisateur = $utilisateur->id;
        $this->nomUtilisateur = $utilisateur->name;
        $this->emailUtilisateur = $utilisateur->email;        
    }

    public function ModifierUser(){
        $this->validate($this->rulesNameEmail, $this->messageNameEmail);
        $utilisateur = User::find($this->idUtilisateur);

        try{
            $utilisateur->name = trim($this->nomUtilisateur);
            $utilisateur->email = trim($this->emailUtilisateur);
            $utilisateur->save();
            session()->flash('successUser','Utilisateur modifié avec succès !');
            
        }catch(\Exception $e){
            session()->flash('errorUser', $e->getMessage());
        }
    }
 
    public function ModifierPassword(){
        $this->validate($this->rulesPassword, $this->messagePassword);

        try{
            $utilisateur = User::find($this->idUtilisateur);
            $utilisateur->password = Hash::make(trim($this->mdpUtilisateur));
            $utilisateur->remember_token = Str::random(60);

            $utilisateur->save();
            session()->flash('successMdp','Mot de passe modifié avec succès !');

        }catch(\Exception $e){
            session()->flash('errorMdp', $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.admin.modifier-utilisateur');
    }
}
