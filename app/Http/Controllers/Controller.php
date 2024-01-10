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

        //Utilisateur et ses commands 
        $user = auth()->user();

        //Séparer chemin selon le role 
        if (auth()->user()->is_admin) {
            
            return view('admin.dashboard',compact('user'));
        } else {
            
            return view('dashboard',compact('user'));}
    }


    
}
