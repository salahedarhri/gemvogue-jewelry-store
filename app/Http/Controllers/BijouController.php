<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bijou;

class BijouController extends Controller
{
    public function index(){
        
        //Tous les produits 
        $bijoux = Bijou::Paginate(24);
        return view('shop', compact('bijoux'));
    }

    public function show($slug){

        //Produit avec similaires selon collection
        $bijou = Bijou::where('slug', $slug)->first();

        if (!$bijou) { abort(404); }

        $bijouxSimilaires = Bijou::where('collection' , $bijou->collection )
        ->where( 'id' , '!=', $bijou->id)
        ->limit(8)
        ->get();
        return view('produit', compact('bijou','bijouxSimilaires'));
    }


}

