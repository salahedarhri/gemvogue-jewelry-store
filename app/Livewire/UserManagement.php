<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\User;

class UserManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')] 

    public $nom;
    public $email;
    public $motdepasse;

    protected $rules = [
        'nom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'motdepasse' => 'required',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',

    ];

    public function AjouterUser(){

        $this->validate($this->rules, $this->message);

        try{
            $utilisateur = new User;
            $utilisateur->nom = trim($this->nom);
            $utilisateur->email = trim($this->email);
            $utilisateur->password = trim($this->motdepasse);
            $utilisateur->save();
            session()->flash('success','Utilisateur créé avec succès !');

        }catch(\Exception $exception){
            session()->flash('error','Une erreur s\'est produite');
        }

    }

    public function ModifierUser(){

    }

    public function render()
    {
        $utilisateurs = User::paginate(10);

        return view('livewire.user-management',[
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
