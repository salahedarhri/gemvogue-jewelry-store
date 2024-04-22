<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\User;

class UserManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')] 

    //For Adding User
    public $nomAdd = '';
    public $emailAdd = '';
    public $motdepasseAdd = '';

    //For Editing User
    public $userIdModify = '';
    public $nomModify = '';
    public $emailModify = '';
    public $motdepasseModify = '';

    protected $rulesAdd = [
        'nomAdd' => 'required|string|max:255',
        'emailAdd' => 'required|string|email|max:255',
        'motdepasseAdd' => 'required',
    ];

    protected $rulesModify = [
        'nomModify' => 'string|max:255',
        'emailModify' => 'string|email|max:255',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',
    ];

    public function AjouterUser(){
        $this->validate($this->rulesAdd, $this->message);
        try{
            $utilisateur = new User;
            $utilisateur->name = trim($this->nomAdd);
            $utilisateur->email = trim($this->emailAdd);
            $utilisateur->password = Hash::make(trim($this->motdepasseAdd));
            $utilisateur->save();

            session()->flash('success','Utilisateur créé avec succès !');
            $this->resetAdd();

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function MontrerUser($id){
        $this->userIdModify = $id;
        $utilisateur = User::find($id);
        $this->nomModify = $utilisateur->name;
        $this->emailModify = $utilisateur->email;
    }

    public function ModifierUser(){
        $this->validate($this->rulesModify, $this->message);

        try{
            $utilisateur = User::find($this->userIdModify);
            $utilisateur->name = trim($this->nomModify);
            $utilisateur->email = trim($this->emailModify);
            
            if(!empty($this->motdepasseModify)){
                $utilisateur->password = Hash::make(trim($this->motdepasseModify));
            }
            
            $utilisateur->save();

            session()->flash('success','Utilisateur modifié avec succès !');
            $this->resetModify();

        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
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
        $this->nomAdd = '';
        $this->emailAdd = '';
        $this->motdepasseAdd = '';
    }

    private function resetModify(){
        $this->nomModify = '';
        $this->emailModify = '';
        $this->motdepasseModify = '';
    }

    public function render()
    {
        $utilisateurs = User::paginate(10);

        return view('livewire.user-management',[
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
