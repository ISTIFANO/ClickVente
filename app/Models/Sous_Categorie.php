<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_Categorie extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'description',
        'categorie_id'
    ];

   
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

  
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'produit_sous_categorie', 'sous_categorie_id', 'produit_id');
    }
}
