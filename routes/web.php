<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JewelryProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () { 
      return view('accueil');     });

Route::get('/welcome', function () { 
      return view('welcome');     });

Route::get('/apropos', function () { 
      return view('apropos');     });

Route::get('/panier', function () {  
      // //Dump and die resets the session
      //   dd(session());
      return view('panier');     })->name('panier');

Route::get('/boutique', [JewelryProductController::class, 'index'])->name('boutique');
Route::get('/bijoux/{slug}', [JewelryProductController::class,'show'])->name('bijou');
Route::get('/addToCart/{id}', [JewelryProductController::class,'addToCart'])->name('panier-add');
Route::get('/updateCart', [JewelryProductController::class,'updateCart'])->name('panier-update');
Route::get('/removeProduct', [JewelryProductController::class,'removeCartItem'])->name('panier-delete');

//Laravel Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
