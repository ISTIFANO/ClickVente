<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    public function show(){
        $categories = Categorie::get();
   
        return view('content.Categorie', compact('categories'));
    }
    public function destroy(Request $request){
     
        if($request['id']){

          $products = Categorie::find($request['id']);
          $products->delete();
        }
    
        return back();
    
    }
    public function store(Request $request)
    {        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);
    
        DB::table('categories')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            return back()->with('success', 'Category created successfully!');
    }
    public function edit(Request $request)
    {
        DB::table('categories')
            ->where('id', $request->id_edit)
            ->update([
                'title' => $request->titre,
                'description' => $request->description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    // dd($request);
        return back();
    }
}
