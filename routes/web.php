<?php

use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
//Livewire
use App\Livewire\afficherBoutique;
use App\Livewire\PanierComponent;
use App\Livewire\ProduitComponent;
//Admin
use App\Livewire\UserManagement;
use App\Livewire\ModifierUtilisateur;
use App\Livewire\AdminDashboard;




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

Route::get('/welcome', function () { return view('welcome');     })
    ->name('welcome');
Route::get('/apropos', function () { return view('apropos');     })
    ->name('apropos');

//Display de bijoux
Route::get('/', function(){ return view('accueil'); })->name('accueil');
Route::get('/boutique', AfficherBoutique::class )->name('boutique');
Route::get('/panier', PanierComponent::class)->name('panier');
Route::get('/bijoux/{slug}', ProduitComponent::class)->name('bijou');

//Newsletter
// Route::post('/newsletter', [NewsletterController::class, 'newsletter_email'])->name('Newsletter');

//Sorting & Filter 
Route::get('/boutique/{categorie}', AfficherBoutique::class )->name('boutiqueCategorie');
Route::get('/boutique/{metal}', AfficherBoutique::class )->name('boutiqueMetal');
Route::get('/boutique/{prix}', AfficherBoutique::class )->name('boutiquePrix');

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

//Administration
Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('utilisateurs', UserManagement::class)->name('adminUsers');
    Route::get('utilisateur/{id}', ModifierUtilisateur::class)->name('manageUser');
    Route::get('dashboard', AdminDashboard::class)->name('adminPanel');
});

require __DIR__.'/auth.php';
