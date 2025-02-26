<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function show(){
        $product = Produit::get();

        return view('.show', compact('product'));
    }

    public function store(Request $request){

        // $data = $request->validate([]);

        
        Produit::create($request->all());
        
        
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
                
                $product = Produit::find($request['id']);
                    $product->update($request->all());
                
                    return back();
            }
        
        
        
        
        }
