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
}
