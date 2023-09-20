<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JewelryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'description','type' , 'photo', 'prix', 'qte_stock', 'type_metal', 'gemme'
    ];

/*     // Mutator for photo attribute 
    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = 'produits/' . time() . '_' . $value->getClientOriginalName();
    }

    // Accessor for photo attribute
    public function getPhotoAttribute($value)
    {
        return asset('storage/' . $value); // Adjust the path based on your storage configuration
    } */
}
