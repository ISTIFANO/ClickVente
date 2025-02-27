<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Produit;
use App\Models\Addresse;
use App\Models\Commande;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
        'addresses_id',
        'img'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the addresses for the user.
     */
    public function addresses()
    {
        return $this->belongsToMany(Addresse::class, 'adress_user', 'user_id', 'addresse_id');
    }

    /**
     * Get the orders for the user.
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'client_id');
    }

    /**
     * Get products administered by this user.
     */
    public function produits()
    {
        return $this->hasMany(Produit::class, 'admin_id');
    }
}
