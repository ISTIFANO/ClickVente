<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantity',
        'commande_id',
        'price_in_time'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }

   
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
