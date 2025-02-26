<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    use HasFactory;
    
protected $fillable = [
    'country',
    'region',
    'city',
    'street',
    'neighborhood',
    'zip'
];

 public function users(){
    return $this->belongsToMany(User::class, 'adress_user', 'addresse_id', 'user_id');
}

public function commandes()
{
    return $this->hasMany(Commande::class);
}


}