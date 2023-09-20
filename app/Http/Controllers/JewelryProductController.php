<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JewelryProduct;

class JewelryProductController extends Controller
{
    public function index()
    {
        $bijoux = JewelryProduct::all();
        return view('boutique', compact('bijoux'));
    }

    public function show($id)
    {
        $bijou = JewelryProduct::find($id);

        $bijouxSimilaires = JewelryProduct::where('collection' , $bijou->collection )
        ->where( 'id' , '!=', $bijou->id)
        ->limit(4)
        ->get();

        return view('produit', compact('bijou','bijouxSimilaires'));
    }
    


    // admin seulement
    public function create()
    {
        return view('products.create');
    }

    //Admin seulement
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'type' => 'required',
            'collection' => 'required',
            'photo1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|numeric',
            'qte_stock' => 'required|integer',
            'type_metal' => 'required',
            'gemme' => 'required',

        ]);

        // Upload des photos :
        if ($request->hasFile('photo1')) {
            $photo = $request->file('photo1');
            $data['photo1'] = $photo->store('produits', 'public');
        }
        if ($request->hasFile('photo2')) {
            $photo = $request->file('photo2');
            $data['photo2'] = $photo->store('produits', 'public');
        }

        JewelryProduct::create($data);

        return redirect()->route('produits.index')
            ->with('success', 'Produit créé avec succès.');
    }


}

