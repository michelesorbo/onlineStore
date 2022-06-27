<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = "Admin Page - Online Store";
        return view('admin.home.index')->with('viewData', $viewData);
    }

    public function products(){
        $viewData = [];
        $viewData['title'] = "Admin Products List";
        $viewData['products'] = Product::all();
        return view('admin.products.index')->with('viewData', $viewData);
    }

    public function store(Request $request){
        //Valido i dati che arrivano dal form
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            "image" => "image",
        ]);

        //Salvo i dati nel Model
        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage('game.png');
        $newProduct->save();

        return back();
    }
}
