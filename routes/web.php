<?php

use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

//Livewire
use App\Livewire\Boutique;
use App\Livewire\Panier;
use App\Livewire\Produit;
use App\Livewire\Accueil;



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



//Pages Principaux
Route::get('/', Accueil::class )->name('accueil');
Route::get('/apropos', function () { return view('apropos'); })->name('apropos');
Route::get('/boutique', Boutique::class )->name('boutique');
Route::get('/panier', Panier::class )->name('panier');
Route::get('/bijoux/{slug}', Produit::class )->name('bijou');

//Newsletter
// Route::post('/newsletter', [NewsletterController::class, 'newsletter_email'])->name('Newsletter');

//Sorting & Filter 
Route::get('/boutique/{categorie}', Boutique::class )->name('boutiqueCategorie');
Route::get('/boutique/{metal}', Boutique::class )->name('boutiqueMetal');
Route::get('/boutique/{prix}', Boutique::class )->name('boutiquePrix');

//Paiement 
Route::post('/checkout',[PanierController::class,'checkout'])->name('checkout');
Route::get('/success',[PanierController::class,'success'])->name('success');
Route::get('/cancel',[PanierController::class,'cancel'])->name('cancel');

//Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [Controller::class,'dashboard'])->middleware(['auth','verified'])->name('dashboard');


require __DIR__.'/auth.php';
