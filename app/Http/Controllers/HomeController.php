<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $viewData = [];
        $viewData['title'] = "Sono index";
        $viewData['subtitle'] = "Sono il sottotitolo di Index del controller";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about(){
        $viewData = [];
        $viewData['title'] = "About Us - Online Store";
        $viewData['subtitle'] = "About Us";
        $viewData['description'] = "Questa è la pagina di about us";
        $viewData['author'] = "Sviluppato da Michele Sorbo";
        return view('home.about')->with('viewData',$viewData);
    }

    public function michele(){
        return view('home.michele');
    }

}
