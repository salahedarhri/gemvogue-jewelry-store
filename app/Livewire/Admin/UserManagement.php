<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Hash;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\User;

class UserManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')] 
    public $nom = '';
    public $email = '';
    public $motdepasse = '';
    public $motdepasse_confirmation = '';
    public $search = '';

    protected $rules = [
        'nom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'motdepasse' => 'required|confirmed|min:6',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',
        'max' => 'La valeur ne doit pas dépasser :max caractères.',
        'string' => 'La valeur doit être une chaîne de caractères.',
        'min' => 'La valeur doit contenir au moins :min caractères.',
        'confirmed' => 'La confirmation ne correspond pas.',
    ];

    public function AjouterUser(){
        $this->validate($this->rules, $this->message);
        try{
            $utilisateur = new User;
            $utilisateur->name = trim($this->nom);
            $utilisateur->email = trim($this->email);
            $utilisateur->password = Hash::make(trim($this->motdepasse));
            $utilisateur->save();

            session()->flash('success','Utilisateur créé avec succès !');
            $this->resetAdd();

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage()); 
        }
    }

    public function SupprimerUser($id){
        try{
            User::find($id)->delete();
            session()->flash('success','Utilisateur supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }
    private function resetAdd(){
        $this->nom = '';
        $this->email = '';
        $this->motdepasse = '';
    }

    public function render()
    {
        $utilisateurs = User::where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%')
                        ->paginate(10);

        return view('livewire.admin.user-management',[
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
