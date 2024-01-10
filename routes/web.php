<?php

use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BijouController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
//Admin
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminBijouController;


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
Route::get('/boutique', [BijouController::class, 'index'])->name('boutique');
Route::get('/bijoux/{slug}', [BijouController::class,'show'])->name('bijou');

//Sorting & Filter 
Route::get('/boutique/byCategory',[ShopController::class,'sortCategory'])->name('shopCategoryFilter');
Route::get('/boutique/byPrix',[ShopController::class,'sortPrix'])->name('shopPrixFilter');
Route::get('/boutique/byPrixRange',[ShopController::class,'sortPrixRange'])->name('shopPrixRangeFilter');
Route::get('/boutique/Order',[ShopController::class,''])->name('shopSortingOrder');

//Panier
Route::get('/panier',[PanierController::class,'index'])->name('panier');
Route::post('/panier-add',[PanierController::class,'addToCart'])->name('ajouterProduitPanier');
Route::put('/panier-update/{rowId}',[PanierController::class,'updateCart'])->name('updatePanier');
Route::delete('/panier-delete/{rowId}',[PanierController::class,'deleteItem'])->name('retirerPanier');

//Paiement 
Route::post('/checkout',[PanierController::class,'checkout'])->name('checkout');
Route::get('/success',[PanierController::class,'success'])->name('success');
Route::get('/cancel',[PanierController::class,'cancel'])->name('cancel');

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

Route::get('/dashboard', [Controller::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//Administration
Route::group(['prefix'=>'admin','middleware'=>'admin.check'],function(){
    Route::resource('utilisateurs', AdminUserController::class);
    Route::resource('bijoux', AdminBijouController::class);
});

Route::prefix('admin')->group(  function(){
    Route::get('utilisateurs',[ AdminUserController::class,'index'])->name('admin.utilisateurs.index');
    Route::get('bijoux',[ AdminBijouController::class,'index'])->name('admin.bijoux.index');
});

require __DIR__.'/auth.php';
