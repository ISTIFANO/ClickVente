<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Commande_Item;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    private $total;
    

    public function commande(){
        $pannierinfo = session()->get('pannier');

        if(empty($pannierinfo)){
            return back();
        }else{

           $this->total = array_sum(array_map( function ($item){

                return $item["price"] * $item["stock"];

            },$pannierinfo));

        }

       $user =  auth()->id();
       $idcommandes = DB::table('commandes')->insertGetId([

            'prix_totale' => $this->total,
            'status' => 'pending',
            'client_id' => $user,
    

        ]);

        foreach ($pannierinfo as $id => $value) {
          DB::table('commande_items')->insertGetId([   
       'produit_id' =>$id,
            'commande_id' => $idcommandes,
            'prix' => $this->total,
        'quantite' =>$value["stock"]

    ]);
        }

return  $idcommandes;
    }

    public function Card(){
$card = session()->get('pannier');

return view("pages.Card",compact("card"));

// dd($card );
    }

    public function AddToCard(Request $request){

        $token = $request->get("stripeToken");

    
    
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $this->total * 100,  
                'currency' => 'usd',
                'description' => ' Aamir el amiri ',
                'source' => $token,
            ]);
    
            DB::table('commandes')->where('id',  $this->commande())->update([
                'status' => 'paid',
            ]);
    session()->forget('pannier');
            return redirect()->route('payment-success');
        } catch (\Exception $e) {
                         return view('payment-failure');
            with('error', 'Error: ' . $e->getMessage());
        }
    }
    
}
