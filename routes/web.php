<?php

use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BijouController;
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


Route::get('/', function () { return view('accueil');     })
    ->name('accueil');
Route::get('/welcome', function () { return view('welcome');     })
    ->name('welcome');
Route::get('/apropos', function () { return view('apropos');     })
    ->name('apropos');

// Display de bijoux
Route::get('/boutique', [BijouController::class, 'index'])->name('boutique');
Route::get('/bijoux/{slug}', [BijouController::class,'show'])->name('bijou');

//Panier
Route::get('/panier',[PanierController::class,'index'])->name('panier');
Route::post('/panier-add',[PanierController::class,'addToCart'])->name('ajouterProduitPanier');
Route::put('/panier-update/{rowId}',[PanierController::class,'updateCart'])->name('updatePanier');
Route::delete('/panier-delete/{rowId}',[PanierController::class,'deleteItem'])->name('retirerPanier');

//Profil :
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Espace Admin (à revoir ) 
Route::middleware('admin.check')->group(function () {
      Route::get('/admin/dashboard', function () {
          return view('admin.dashboard');
      })->name('admin.dashboard');
  });

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return view('admin.dashboard');
    } else {
        return view('dashboard');
    }})->middleware(['auth', 'verified'])->name('dashboard');

//Admininstration
// Route::group(['prefix'=>'admin','middleware'=>'admin.check'],function(){
//     Route::resource('utilisateurs', AdminUserController::class);
//     Route::resource('bijoux', AdminCarController::class);
//     Route::resource('achats', AdminReservationController::class);
// });

// Route::prefix('admin')->group(  function(){

// });

require __DIR__.'/auth.php';
