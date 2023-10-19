<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bijou extends Model
{
    use HasFactory;

    protected $table = 'jewelry_products';
    protected $fillable = [
        'nom', 'description','type', 'prix', 'qte_stock', 'type_metal'
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
