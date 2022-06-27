<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

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

        if($request->hasFile('image')){
            $imageName = $newProduct->getId().".".$request->file('image')->extension(); //Rinomino l'immagine con l'id del prodotto e l'estensione del file
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return back();
    }

    public function delete($id){
        Product::destroy($id);
        return back();
    }
}
