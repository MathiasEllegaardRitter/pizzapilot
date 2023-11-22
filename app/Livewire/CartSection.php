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
        $this->cart = session('cart');

        if (empty($cart)) {
            $this->cart = [];
        } else {
            foreach ($cart as $item) {
                $existingProduct = $this->findExistingProduct($item['product_id'], $item['product_name'], $item['product_price']);
                $existingProductIndexInCart = $this->findExistingProductIndexInCart($item['product_id'], $item['product_name'], $item['product_price']);
                if (!$existingProduct) {
                    // If product doesn't exist in the database remove it.
                    unset($this->cart[$existingProductIndexInCart]);
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
        $existingProductIndex = $this->findExistingProductIndexInCart($product->id, $product->name, $product->price);
        
        if($existingProductIndex !== false)
        {
            // Then add one to item to product
            $this->cart[$existingProductIndex]['quantity'] += 1;
        } else
        {
            $this->cart[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'quantity' => 1,
            ];
        }
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

    private function findExistingProductIndexInCart($productId, $productName, $productPrice)
    {
        foreach ($this->cart as $index => $item) {
        if ($item['product_id'] == $productId &&
            $item['product_name'] == $productName &&
            $item['product_price'] == $productPrice) {
            return $index;
        }
    }
        return false;
    }

}
