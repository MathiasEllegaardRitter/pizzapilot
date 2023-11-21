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
            $this->cart = $cart;
        }
    }

    public function render()
    {
        return view('livewire.cart-section')->with('cart', $this->cart);
    }

    #[On('addToCart')]
    public function addToCart(Product $product)
    {
        // Adds cart to the live component
        $this->cart[] = $product;
        // Then we persist it in a session so it can be used on different pages with the help of the mount function
        session(['cart' => $this->cart]);
    }
    
    public function removeFromCart($product)
    {
        $this->cart->remove($product);
    }
}
