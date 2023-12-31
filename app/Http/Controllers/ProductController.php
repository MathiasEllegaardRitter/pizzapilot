<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function readAll()
    {
        $products = Product::all();

        return view('products', ['products' => $products]);
    }

    public function get(Request $request)
    {
        // Find a productId from request
        $productId = $request->input('product_id');
        // Find product from Database
        $product = Product::findOrFail($productId);
        // If product exist else return error
        if ($product) {
            return view('product', ['product' => $product]);
        } else {
            // TODO Error
        }
    }

    public function delete(Request $request)
    {
        // Find a productId from request
        $productId = $request->input('product_id');
        // Find the product from database
        $product = Product::findOrFail($productId);
        if ($product) {
            $product->delete();

            return redirect()->route('products.create');
        } else {
            // TODO Error
        }
    }

    public function update(Request $request)
    {
        // Find a productId from request
        $productId = $request->input('product_id');
        // Find the product from database
        $product = Product::findOrFail($productId);
        // Update the product with the new values and save if exist
        if ($product) {
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->save();

            // Load the same site  i am on.
            return view('product', ['product' => $product]);
        } else {
            // TODO Error
        }

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
