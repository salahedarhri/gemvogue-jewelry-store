<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Cart;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard(){

        if (auth()->check()) {
            $user = auth()->user();
    
            if ($user->is_admin) {
                return redirect()->route('adminPanel');
            }else{
                return view('dashboard', compact('user'));
            }
        } else {
            return redirect()->route('login');
        }
    }


    
}
