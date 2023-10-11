<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JewelryProduct;
use Illuminate\Support\Str;

class JewelryProductController extends Controller
{
    public function index()
    {
        $bijoux = JewelryProduct::all();
        return view('boutique', compact('bijoux'));
    }

    public function show($slug)
    {
        $bijou = JewelryProduct::where('slug', $slug)->first();

        if (!$bijou) {
            abort(404);
        }
            $bijouxSimilaires = JewelryProduct::where('collection' , $bijou->collection )
            ->where( 'id' , '!=', $bijou->id)
            ->limit(4)
            ->get();
            return view('produit', compact('bijou','bijouxSimilaires'));
    }
    //Panier de shopping :
    public function cart(){
        return view('cart');
    }
    public function addToCart($id){
        $bijou = JewelryProduct::findOrFail($id);
        $cart = session()->get('cart',[]);

        if(isset($cart[$id])) {
            $cart[$id]['qte']++;
        }  else {
            $cart[$id] = [
                "product_name" => $bijou->nom,
                "photo1" => $bijou->photo1,
                "photo2" => $bijou->photo2,
                "prix" => $bijou->prix,
                "qte" => 1 ];
            }
        //Enregister les données du panier du session avec :
        session()->put('cart', $cart);
        //Retourner la page avec notif :
        return redirect()->back()->with('success', 'Commande ajoutée au panier avec succès !');
    }

    //Admin seulement
    public function create()
    {
        return view('products.create');
    }

    //Admin seulement
    /*public function store(Request $request)
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

