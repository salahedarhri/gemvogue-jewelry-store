<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

//Admin
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\ProduitManagement;
use App\Livewire\Admin\MessageManagement;
use App\Livewire\Admin\CommandeManagement;
use App\Livewire\Admin\NewsletterManagement;
use App\Livewire\Admin\AfficherMessage;
use App\Livewire\Admin\AfficherProduit;
use App\Livewire\Admin\ModifierUtilisateur;
use App\Livewire\Admin\ModifierCommande;
use App\Livewire\Admin\AdminDashboard;



//Administration
Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('dashboard', AdminDashboard::class)->name('adminPanel');
    //Utilisateurs
    Route::get('utilisateurs', UserManagement::class)->name('adminUsers');
    Route::get('utilisateur/{id}', ModifierUtilisateur::class)->name('manageUser');
    //Messages
    Route::get('messages', MessageManagement::class)->name('adminMessages');
    Route::get('message/{id}', AfficherMessage::class)->name('manageMessage');
    //Produits
    Route::get('bijoux', ProduitManagement::class)->name('adminBijoux');
    Route::get('bijou/{id}', AfficherProduit::class)->name('manageBijou');
    //Commandes
    Route::get('commandes', CommandeManagement::class)->name('adminCommandes');
    Route::get('commande/{id}', ModifierCommande::class)->name('manageCommande');
    //Newsletters
    Route::get('newsletters', NewsletterManagement::class)->name('adminNewsletters');
});


require __DIR__.'/auth.php';
