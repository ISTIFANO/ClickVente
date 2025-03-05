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

    public function showCommandes(){
$commande = Commande::get();

return view('content.Validate',compact('commande'));


        
    } 
    public function Changestatus(Request $request){
// dd($request->id);
        DB::table('commandes')
        ->where('id', $request->id)
        ->update([
            'status' => $request->status,
        ]);

        return back();
        
    }

    public function commande()
    {
        $pannierinfo = session()->get('pannier');

        if (empty($pannierinfo)) {
            return back();
        } else {
            $this->total = array_sum(array_map(function ($item) {
                return $item["price"] * $item["stock"]; 
            }, $pannierinfo));
        }

        $user = auth()->id();
        $idcommandes = DB::table('commandes')->insertGetId([
            'prix_totale' => $this->total,
            'status' => 'pending',
            'client_id' => $user,
        ]);

        foreach ($pannierinfo as $id => $value) {
            DB::table('commande_items')->insert([
                'produit_id' => $id,
                'commande_id' => $idcommandes,
                'prix' => $value["price"], 
                'quantite' => $value["stock"],
            ]);
        }

        return $idcommandes;
    }

    public function Card()
    {
        $card = session()->get('pannier');
        return view("pages.Card", compact("card"));
    }

    public function AddToCard(Request $request)
    {
        $token = $request->stripeToken;
  Stripe::setApiKey(env('STRIPE_SECRET'));
dd($token); 
        try {
            Charge::create([
                'amount' => $this->total * 100, 
                'currency' => 'usd',
                'description' => 'Aamir el amiri',
                'source' => $token,
            ]);

            $commandeId = $this->commande();  
            DB::table('commandes')->where('id', $commandeId)->update([
                'status' => 'paid',
            ]);

            session()->forget('pannier');  
            return redirect()->route('payment-success');
        } catch (\Exception $e) {
            return view('payment-failure')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
