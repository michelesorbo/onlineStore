<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Creo i dati da passare alla pagina
    /*
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "image" => "game.png", "price"=>"1000"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "image" => "safe.png", "price"=>"999"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "image" => "submarine.png", "price"=>"30"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "image" => "game.png", "price"=>"100"]
        ];
        */
    public function index(){
        $viewData = [];
        $viewData['title'] = "Prodotti - Online Store";
        $viewData['subtitle'] = "I nostri prodotti";
        $viewData['products'] = Product::all();
        return view('prodotti.index')->with("viewData", $viewData);
    }

    public function show($id){
        //Inserisci codice
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName()." - Online Strore";
        $viewData['subtitle'] = $product->getName();
        $viewData['product'] = $product;
        return view('prodotti.show')->with('viewData', $viewData);
    }
}
