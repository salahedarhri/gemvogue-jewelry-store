<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Message;

class MessageManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')] 

    public function SupprimerMessage($id){
        try{
            Message::find($id)->delete();
            session()->flash('success','Message supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function render()
    {
        $messages = Message::paginate(10);

        return view('livewire.admin.message-management',[
            'messages' => $messages,
        ]);
    }
}
