<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Sous_Categorie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProduitController extends Controller
{
    public function Home_pannier(Request $request){
        $id = $request["id"];
        // dd($request["id"]);
                $produit = Produit::find($request["id"]);
        
        if(!$produit){
            return back();
        }
            $pannier= session()->get('pannier',[]);
        // dd($pannier);   
        
        if (isset($pannier[$id])) {
            $pannier[$id]['stock'] +=$request->quantite;
        }else{
            $pannier[$id] = [
                'name' => $produit->titre,
                'price' => $produit->prixunite,
                'stock' => $request->quantite,
                'image' => $produit->image,
            ];
        }
        
        //  dd($pannier);
        session()->put('pannier', $pannier);
        // dd(session('pannier'));
        
        return back();
        
            }
    public function pannier(Request $request){
$id = $request["id"];
// dd($request["id"]);
        $produit = Produit::find($request["id"]);

if(!$produit){
    return back();
}
    $pannier= session()->get('pannier',[]);
// dd($pannier);   

if (isset($pannier[$id])) {
    $pannier[$id]['stock'] +=$request->quantite;
}else{
    $pannier[$id] = [
        'name' => $produit->titre,
        'price' => $produit->prixunite,
        'stock' => $request->quantite,
        'image' => $produit->image,
    ];
}

//  dd($pannier);
session()->put('pannier', $pannier);
// dd(session('pannier'));

return redirect('/Pannier/showpannier');

    }

    public function showpannier()
{
    $cart = session()->get('pannier');
    
    return view('content.pannier', compact('cart'));
}
public function delete_produit_from_pannier(Request $request)
{
    $id = $request['id'];
    
    $cart = session()->get('pannier');
    if (isset($cart[$id])) {

        unset($cart[$id]);
    }
 session()->put('pannier', $cart);
    return back();
}
public function delete_produit(Request $request)
{
    $id = $request['id'];
    
    $cart = session()->get('pannier');
    if (isset($cart[$id])) {

        unset($cart[$id]);
    }
 session()->put('pannier', $cart);
    return back();
}


    public function dashviews(){
        // return View::make('pages.Admin');

        return view('pages.admin');
    }
    
    public function show(){
        $produits = Produit::get();
        $categories = Categorie::all();


        // foreach ($produits as $produit) {
        //     Sous_Categorie::find($produit->souscategorie_id);
        // }
        return view('content.produit', compact('produits'),compact('categories') );
    }
    // public function findproduct(Request $request){
    //     $detailsProduit = Produit::find($request['id']);

    
    //     return view('Home', compact('detailsProduit'));
    // }
    
    public function product(){
        $products = Produit::paginate(8);
        // $categories = Sous_Categorie::all();


        // foreach ($produits as $produit) {
        //     Sous_Categorie::find($produit->souscategorie_id);
        // }
        return view('Home', compact('products'));
    }

    public function details(Request $request){

        $product = Produit::find($request['id']);
        return view('content.Details',compact('product'));
    }
    public function store(Request $request){

        // $data = $request->validate([]);
        $imageName = time().'.'.$request->image->extension();
        // echo public_path();
        // die();
        // dd($request);
        $request->image->move(public_path('images'), $imageName);
            $productss = Produit::create([
                'image' =>'GJWN '.$imageName,
                'titre' => $request->titre,
                'description' => $request->description,
                'prixunite' => $request->prixunite,
                'stock' => $request->stock,
                'souscategorie_id' =>$request['souscategorie_id'],  

          ]);
            return back();
        
            }
        
            public function destroy(Request $request){
     
                if($request['id']){
        
                  $products = Produit::find($request['id']);
                  $products->delete();
                }
                return back()->with('succ', 'deleted  succ');
            }
        

public function update(Request $request)
{
    DB::table('produits')
        ->where('id', $request->id)
        ->update([
            'titre' => $request->titre,
            'description' => $request->description,
        ]);

    return back();
}

        
        
        
        
        }
