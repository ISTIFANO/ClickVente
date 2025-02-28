<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'titre',
        'description',
        'prixunite',
        'stock',
        'souscategorie_id',
        'users_id'
    ];

    
    public function sousCategorie()
    {
        return $this->belongsTo(Sous_Categorie::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

   
    public function sousCategories()
    {
        return $this->belongsToMany(Sous_Categorie::class, 'produit_sous_categorie', 'produit_id', 'sous_categorie_id');
    }

    public function commandeItems()
    {
        return $this->hasMany(Commande_Item::class);
    }
}
