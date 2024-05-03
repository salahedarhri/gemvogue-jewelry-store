<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Bijou;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class ProduitManagement extends Component
{
    use WithFileUploads;
    use WithPagination;
    #[Layout('layouts.admin')] 

    public $nom = '';
    public $prix = '';
    public $slug = '';
    public $type = '';
    public $description = '';
    public $photo1;
    public $photo2;
    public $collection = '';
    public $qteStock = '';
    public $typeMetal = '';

    public $search = '';
    public $ordreVariable = null;
    public $ordre = 'asc';

    protected $rules = [
        'nom' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'type' => 'required|string|max:255',
        'description' => 'required|string',
        'photo1' => 'required|image|max:500',
        'photo2' => 'required|image|max:500',
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
    
    public function AjouterBijou(){
        $this->validate($this->rules, $this->message);

        try{
            $bijou = new Bijou;
            $bijou->nom = trim($this->nom);
            $bijou->type = trim($this->type);
            $bijou->prix = trim($this->prix);
            $bijou->slug = Str::slug("$this->nom-$this->type");
            $bijou->description = trim($this->description);
            $bijou->collection = trim($this->collection);
            $bijou->qte_stock = trim($this->qteStock);
            $bijou->type_metal = trim($this->typeMetal);

            $bijou1 = $bijou->slug.'1'.'.jpg';
            $bijou2 = $bijou->slug.'2'.'.jpg';

            $this->photo1->storeAs('bijoux', $bijou1,'public');
            $this->photo2->storeAs('bijoux', $bijou2,'public');

            $upload1 = File::move(
                storage_path('app/public/bijoux/'.$bijou1),
                public_path('images/produits/notcompressed/'.$bijou1) );

            $upload2 = File::move(
                storage_path('app/public/bijoux/'.$bijou2),
                public_path('images/produits/notcompressed/'.$bijou2) );

            File::copy(
                public_path('images/produits/notcompressed/'.$bijou1),
                public_path('images/produits/compressed/'.$bijou1) );

            File::copy(
                public_path('images/produits/notcompressed/'.$bijou2),
                public_path('images/produits/compressed/'.$bijou2) );

            $bijou->photo1 = $bijou1;
            $bijou->photo2 = $bijou2;

            if( $upload1 == true && $upload2 == true){
                $bijou->save();
            }else{
                session()->flash('error','Erreur de téléchrgement des photos');
            }

            session()->flash('success','Bijou ajouté avec succès !');
            $this->resetAdd();

        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            dump($e->getMessage());
        }
    }

    public function SupprimerBijou($id){
        try{
            Bijou::find($id)->delete();
            session()->flash('success','Bijou supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            dump($e->getMessage());
        }
    }

    private function resetAdd(){
        $this->nom = '';
        $this->prix = '';
        $this->slug = '';
        $this->type = '';
        $this->description = '';
        $this->photo1 = '';
        $this->photo2 = '';
        $this->collection = '';
        $this->qteStock = '';
        $this->typeMetal = '';
    }

    public function sortBy($v){
        if($this->ordreVariable == $v){
            $this->ordre = $this->ordre === 'asc' ? 'desc':'asc';
        }else{
            $this->ordre = 'asc';
        }

        $this->ordreVariable = $v;
    }

    public function render()
    {
        $query = Bijou::where('nom','like','%'.$this->search.'%');

        if(!empty($this->ordreVariable)){
            $query->orderBy($this->ordreVariable,$this->ordre);
        }

        $bijoux = $query->paginate(12);

        return view('livewire.admin.produit-management',[
            'bijoux' => $bijoux,
        ]);
    }
}
