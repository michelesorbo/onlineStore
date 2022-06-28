<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

//Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/', [HomeController::class, 'index'])->name('index');

//Creo la route di abaut us
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Creo la rout per la pagina principale dei prodotti
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

//creo la rout per il dettaglio prodotto passando il parametro ID
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

//Creo le Rout per il carrello
Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
Route::get('/cart/delete', [CartController::class, 'delete'])->name("cart.delete");
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name("cart.add");

//Creo le rout per l'area Admin
Route::middleware('admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home.index'); //Index Admin
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products.index'); //Products Admin
    Route::post('/admin/products/store', [AdminController::class, 'store'])->name('admin.product.store'); //Inserire nuovo prodotto in DB
    Route::delete('/admin/products/{id}/delete', [AdminController::class, 'delete'])->name('admin.product.delete'); //Cancello il prodotto
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'edit'])->name('admin.product.edit'); //Edito il prodotto selezionato
    Route::put('/admin/products/{id}/update', [AdminController::class, 'update'])->name('admin.product.update'); //Effettuo l'update del prodotto selezionato
});

Route::get('/corso', function(){
    return 'Ciao dal corso di Laravel';
});

Route::get('/utenti/michele', [HomeController::class, 'michele'])->name('michele');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
