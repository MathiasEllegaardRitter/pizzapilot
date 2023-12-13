<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Favorites;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class Favoritespage extends Component
{
    public $favorites;

    public $product_id, $user_id;

    public $products;


    public function clickProduct($productId)
    {
        $this->dispatch('clickProduct', $productId);
    }
    
    public function toggleFavorite($productId)
    {
        $user = auth()->user();     
        $customer = $user->customer;

        if ($customer->favorites->contains($productId)) {
            // Remove from favorites
            $customer->favorites()->detach($productId);
            $message = 'Item removed from favorites.';
        } else {
            // Add to favorites
            $customer->favorites()->attach($productId);
            $message = 'Item added to favorites.';
        }

        $this->dispatch('favoritesUpdated');
    }

    public function addToCart($productId)
    {
        $product = $this->products->find($productId);
        if($product != null) {
            $this->addProductToSession($product);
            $this->dispatch('showCart',  true);
            $this->dispatch('addToCart', $product);
        } else
        {

        }
    }

    public function addProductToSession($product)
    {
        $cart = session('cart', []);

        $existingProductIndex = $this->findExistingProductIndexInCart($product->id, $product->name, $product->price);

        if ($existingProductIndex !== false) {
            // Add one item to cart
            $cart[$existingProductIndex]['quantity'] += 1;
        } else {
            $cart[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
                'quantity' => 1,
            ];
        }
        // Persist the updated cart in the session
        session(['cart' => $cart]);
    }

    private function findExistingProductIndexInCart($productId, $productName, $productPrice)
    {
        $cart = session('cart', []);
        foreach ($cart as $index => $item) {
        if ($item['product_id'] == $productId &&
            $item['product_name'] == $productName &&
            $item['product_price'] == $productPrice) {
            return $index;
        }
    }
        return false;
    }
     
    public function render()
    {
        $this->favorites=auth()->user()->favorites;
        return view('livewire.favoritespage')->with('favorites', $this->favorites);
    }
    
}
