<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.Admin');
})->middleware(['auth'])->name('dashboard');
Route::get('/dash', function () {
    return view('pages.Admin');
});

require __DIR__.'/auth.php';





Route::get('/dash',[ProduitController::class,'dashviews']);
Route::get('/logout',[AuthenticatedSessionController::class,'destroy']);