<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

//Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/', [HomeController::class, 'index'])->name('index');

//Creo la route di abaut us
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Creo la rout per la pagina principale dei prodotti
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

//creo la rout per il dettaglio prodotto passando il parametro ID
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


//Creo le rout per l'area Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home.index'); //Index Admin
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products.index'); //Products Admin
Route::post('/admin/products/store', [AdminController::class, 'store'])->name('admin.product.store'); //Inserire nuovo prodotto in DB

Route::get('/corso', function(){
    return 'Ciao dal corso di Laravel';
});

Route::get('/utenti/michele', [HomeController::class, 'michele'])->name('michele');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
