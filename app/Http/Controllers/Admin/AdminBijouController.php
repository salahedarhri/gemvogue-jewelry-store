<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bijou;
use Illuminate\Http\Request;

class AdminBijouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bijoux=Bijou::paginate(12);
        return view('admin.bijoux.index',compact('bijoux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bijou $bijou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bijou $bijou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bijou $bijou)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bijou $bijou)
    {
        //
    }

        /*
    //Admin seulement
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

        ]);

        //Unique Slug setup pour lien :
        $slug = Str::slug($data['nom'] . '-' . $data['type'] . '-' . $data['collection']);
        $count = 1;
        while (JewelryProduct::where('slug', $slug)->exists()) {
            $slug = Str::slug($data['nom'] . '-' . $data['type'] . '-' . $data['collection'] . '-' . $count++);
        }
        $data['slug'] = $slug;

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
    }*/
}
