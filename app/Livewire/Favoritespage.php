<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Favorites;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
class Favoritespage extends Component
{
    public $favorites;

    public $products;

    public $showCart;

    public function mount()
    {
        $this->showCart = false;
    }

    #[On('showCart')]
    public function showCart($result)
    {
        $this->showCart = $result;
    }


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
        } else {
            // Add to favorites
            $customer->favorites()->attach($productId);
        }

        $this->dispatch('favoritesUpdated');
    }

    public function addToCart($productId)
    {
        // Ensure $this->products is not null before trying to find the product
        if ($this->products) {
            $product = $this->products->find($productId);
    
            if ($product != null) {
                $this->addProductToSession($product);
                $this->dispatch('showCart', true);
                $this->dispatch('addToCart', $product);
            } else {

            }
        } else {

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
        $this->favorites = auth()->user()->favorites;
    
        // Fetch products only if favorites are not empty
        $this->products = $this->favorites->isNotEmpty()
            ? Product::whereIn('id', $this->favorites->pluck('id'))->get()
            : collect(); // Initialize as an empty collection if no favorites
    
        return view('livewire.favoritespage')
            ->with('favorites', $this->favorites)
            ->with('products', $this->products)
            ->with('showCart', $this->showCart);
    }
    
    
}
