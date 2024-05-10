<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Newsletter;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


class NewsletterManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')] 

    public $search = '';
    public $email = '';
    public $emailAdd = '';
    public $idEmail;

    protected $rulesAdd = [
        'emailAdd' => 'required|email'
    ];

    protected $rules = [
        'email' => 'required|email'
    ];

    public function SupprimerEmail($id){
        try{
            Newsletter::find($id)->delete();
            session()->flash('success','l\'email est supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function AjouterEmail(){
        $this->validate($this->rulesAdd);
        try{
            $newsletter = New Newsletter;
            $newsletter->email = $this->emailAdd;

            $newsletter->save();
            session()->flash('success','l\'email est ajouté avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function MontrerEmail($e, $i){
        $this->idEmail = $i;
        $this->email = $e;
    }

    public function ModifierEmail(){
        $this->validate($this->rules);

        try{
            $newsletter = Newsletter::findOrFail($this->idEmail);
            $newsletter->email = $this->email;
            $newsletter->save();
            session()->flash('success','l\'email est modifié avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function render()
    {
        $emails = Newsletter::where('email', 'like', '%'.$this->search.'%')->paginate(12);

        return view('livewire.admin.newsletter-management',[
            'emails' => $emails,
        ]);
    }
}
