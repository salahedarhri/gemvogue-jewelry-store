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
    public $idEmail;

    public function SupprimerEmail($id){
        try{
            Newsletter::find($id)->delete();
            session()->flash('success','l\'email est supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function MontrerEmail($e, $i){
        $this->idEmail = $i;
        $this->email = $e;
    }

    public function ModifierEmail(){
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
