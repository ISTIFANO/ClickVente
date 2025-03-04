<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Commande_Item;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function commande(){

        $pannierinfo = session()->get('pannier');

        // dd($pannierinfo);
        if(empty($pannierinfo)){
            return back();
        }else{

            $total = array_sum(array_map( function ($item){

                return $item["price"] * $item["stock"];

            },$pannierinfo));

        }

       $user =  auth()->id();
       $idcommandes = DB::table('commandes')->insertGetId([

            'prix_totale' => $total,
            'status' => 'pending',
            'client_id' => $user,
    

        ]);

        foreach ($pannierinfo as $id => $value) {
          DB::table('commande_items')->insertGetId([   
       'produit_id' =>$id,
            'commande_id' => $idcommandes,
            'prix' => $total,
        'quantite' =>$value["stock"]

    ]);
        }


    }
}
