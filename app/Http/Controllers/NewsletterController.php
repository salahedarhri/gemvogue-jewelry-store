<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function Newsletter(Request $request){

        $conditions = $request->validate(['email' =>'required'], 'Ce champ est obligatoire' );
    
        $email = $request->input('email');
    
        Newsletter::create([
            'email' => $email,
        ]);
    
        return redirect()->back()->with('success', "Votre email ($email) est ajouté avec succès !");
    }
}
