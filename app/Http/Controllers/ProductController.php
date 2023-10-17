<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function readAll()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

}
