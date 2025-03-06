<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
}
public function processPayment(Request $request)
{
    $stripeToken = $request->input('stripeToken');
    $pannierinfo = session()->get('pannier');

    $total = array_sum(array_map(function ($item) {
        return $item["price"] * $item["stock"];
    }, $pannierinfo));

    Stripe::setApiKey(env('STRIPE_SECRET')); // Secret key

    try {
        $charge = Charge::create([
            'amount' => $total * 100,  // Amount is in cents
            'currency' => 'usd',
            'description' => 'Order Payment',
            'source' => $stripeToken,
        ]);

        // Store the charge details in the database
        DB::table('commandes')->where('id', $request->commande_id)->update([
            'status' => 'paid',
            'stripe_charge_id' => $charge->id
        ]);

        return redirect()->route('order.success')->with('success', 'Payment successful!');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}