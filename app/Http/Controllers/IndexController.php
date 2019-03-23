<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->take(5)->get();

        $page = [
            'pageTitle' => 'Home',
        ];

        return view('index', ['products' => $products], compact('page'));
    }
}
