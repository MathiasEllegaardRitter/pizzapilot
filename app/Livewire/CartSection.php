<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;

class CartSection extends Component
{
    public $cart;

    public function mount()
    {
        $cart = session('cart');

        if (empty($cart)) {
            $this->cart = [];
        } else {
            foreach ($cart as $product) {
                $existingProduct = $this->findExistingProduct($product->id, $product->name, $product->price);
        
                if ($existingProduct) {
                    $this->cart[] = $existingProduct; // Add product to session
                }
            }
        }
    }

    public function render()
    {
        // returns he cart with all the products
        return view('livewire.cart-section')->with('cart', $this->cart);
    }

    #[On('addToCart')]
    public function addToCart(Product $product)
    {
        $existingProduct = $this->findExistingProduct($product->id, $product->name, $product->price);
        // Adds cart to the live component
        $this->cart[] = $existingProduct;

        // Then we persist it in a session so it can be used on different pages with the help of the mount function
        session(['cart' => $this->cart]);
    }
    
    public function removeFromCart($product)
    {
        $this->cart->remove($product);
    }

    public function removeAll()
    {
        $this->cart = [];
        session(['cart' => []]);
    }

    private function findExistingProduct($productId, $productName, $productPrice): Product
    {
        return Product::where('id', $productId)
            ->where('name', $productName)
            ->where('price', $productPrice)
            ->first();
    }


}
