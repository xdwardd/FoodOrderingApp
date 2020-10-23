<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    
    public function index()
    {
        $products = Product::take(6)->get();
       return view('home', ['products' => $products]);
    }
}
