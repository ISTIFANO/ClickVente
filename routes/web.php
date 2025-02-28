<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategorieController;
use App\Models\Categorie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('pages.Admin');
})->middleware(['auth'])->name('dashboard');
Route::get('/dash', function () {
    return view('pages.Admin');
});

require __DIR__.'/auth.php';


Route::get('/',[ProduitController::class,'product']);


Route::get('/Categories',[CategorieController::class,'show']);
Route::post('/categorie/delete',[CategorieController::class,'destroy']);
Route::post('/categorie/create',[CategorieController::class,'store']);
Route::post('/categorie/edit',[CategorieController::class,'edit']);

Route::get('/Produits',[ProduitController::class,'show']);
Route::get('/Product/details/{id}',[ProduitController::class,'details']);
Route::post('Product/details/Pannier/Ajouter',[ProduitController::class,'pannier']);
Route::get('/Pannier/showpannier', [ProduitController::class, 'showpannier']);
Route::delete('/Pannier/delete_produit_from_pannier', [ProduitController::class, 'delete_produit_from_pannier']);

Route::delete('produits/destroy',[ProduitController::class,'destroy']);
Route::post('produit/store',[ProduitController::class,'store']);
Route::get('/dash',[ProduitController::class,'dashviews']);
Route::get('/logout',[AuthenticatedSessionController::class,'destroy']);