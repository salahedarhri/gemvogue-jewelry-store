<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Bijou;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;




class AfficherProduit extends Component
{
    use WithFileUploads;
    #[Layout('layouts.admin')] 

    public $collection;
    public $photo1;
    public $photo2;
    public $photo1Modify;
    public $photo2Modify;
    public $description;
    public $type;
    public $nom;
    public $prix;
    public $qteStock;
    public $typeMetal;

    public $idBijou;

    protected $rules = [
        'nom' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'type' => 'required|string|max:255',
        'description' => 'required|string',
        'photo1' => 'max:500',
        'photo2' => 'max:500',
        'collection' => 'required|string|max:255',
        'qteStock' => 'required|integer|min:0',
        'typeMetal' => 'required|string|max:255',
    ];

    protected $message = [
        'required' => 'Ce champ est requis.',
        'string' => 'Ce champ doit être une chaîne de caractères.',
        'max' => 'Ce champ ne doit pas dépasser :max Kb.',
        'numeric' => 'Ce champ doit être un nombre.',
        'min' => 'Ce champ doit être supérieur ou égal à :min Kb.',
        'image' => 'Ce champ doit être une image.',
        'integer' => 'Ce champ doit être un entier.',
    ];

    public function mount($id){
        $bijou = Bijou::findOrFail($id);

        $this->idBijou = $id;
        $this->collection = $bijou->collection;
        $this->description = $bijou->description;
        $this->photo1Modify = $bijou->photo1;
        $this->photo2Modify = $bijou->photo2;
        $this->type = $bijou->type;
        $this->nom = $bijou->nom;
        $this->prix = $bijou->prix;
        $this->qteStock = $bijou->qte_stock;
        $this->typeMetal = $bijou->type_metal;
    }

    public function ModifierBijou(){
        $this->validate($this->rules, $this->message);

        try{
            $bijou = Bijou::findOrFail($this->idBijou);
            $bijou->nom = $this->nom;
            $bijou->type = $this->type;
            $bijou->prix = $this->prix;
            $bijou->slug = Str::slug("$this->nom-$this->type");
            $bijou->type_metal = $this->typeMetal;
            $bijou->qte_stock = $this->qteStock;

            if(File::exists(public_path('images/produits/notcompressed/'.$this->photo1Modify)) && $this->photo1){
                File::delete(public_path('images/produits/notcompressed/'.$this->photo1Modify));

                $bijou1 = $bijou->slug.'1'.'.jpg';
                $this->photo1->storeAs('bijoux', $bijou1,'public');

                File::move(
                    storage_path('app/public/bijoux/'.$bijou1),
                    public_path('images/produits/notcompressed/'.$bijou1) );

                $bijou->photo1 = $bijou1;
            }

            if(File::exists(public_path('images/produits/notcompressed/'.$this->photo2Modify)) && $this->photo2){
                File::delete(public_path('images/produits/notcompressed/'.$this->photo2Modify));

                $bijou2 = $bijou->slug.'2'.'.jpg';
                $this->photo2->storeAs('bijoux', $bijou2,'public');

                File::move(
                    storage_path('app/public/bijoux/'.$bijou2),
                    public_path('images/produits/notcompressed/'.$bijou2) );

                $bijou->photo2 = $bijou2;
            }

            $bijou->save();
            session()->flash('success','Le bijou a été modifié avec succès !');

        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            dump($e->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.admin.afficher-produit');
    }
}
