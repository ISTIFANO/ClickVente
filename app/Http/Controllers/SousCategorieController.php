<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    protected $fillable = [
        'name',
        'description',
        'categorie_id'
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    /**
     * Get the products for the subcategory.
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'produit_sous_categorie', 'sous_categorie_id', 'produit_id');
    }}
