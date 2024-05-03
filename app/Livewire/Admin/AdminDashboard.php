<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Message;

class AdminDashboard extends Component
{
    #[Layout('layouts.admin')] 

    public $utilisateurs;
    public $commandes;
    public $messages;

    public function mount(){
        $this->utilisateurs = User::count();
        $this->commandes = Order::count();
        $this->messages = Message::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
