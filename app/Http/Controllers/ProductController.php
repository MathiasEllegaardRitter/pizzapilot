<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    //
    public function readAll()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function create(Request $request)
    {

        // Create a product and fill in the varibles with forms

        $product = new Product;

 

        $product->name = $request->input('name');

 

        $product->price = $request->input('price');

 

        $product->description = $request->input('description');

        // TODO: Add ingridents


        // Save to Database
        $product->save();

 

        return redirect()->route('products.create');
    }

}
