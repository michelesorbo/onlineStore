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

        //Salvo i dati nel Model
        Product::validate($request);
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

    public function edit($id){
        $viewData = [];
        $viewData['title'] = "Admin Page - Edit Product";
        $viewData['product'] = Product::findOrFail($id);
        return view('admin.products.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id) {

        Product::validate($request);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }

        $product->save();
        return redirect()->route('admin.products.index');
    }
}
