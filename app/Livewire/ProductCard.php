<?php

namespace App\Livewire;

use Livewire\Component;

class ProductCard extends Component
{
    public $product;
    public $isFavorite;

    public function mount($product)
    {
        $this->product = $product;
        $this->isFavorite = auth()->check() && auth()->user()->customer->favorites->contains($product->id);
    }

    public function toggleFavorite()
    {
        $user = auth()->user();
        $customer = $user->customer;

        if ($customer->favorites->contains($this->product->id)) {
            // Remove from favorites
            $customer->favorites()->detach($this->product->id);
            $message = 'Item removed from favorites.';
        } else {
            // Add to favorites
            $customer->favorites()->attach($this->product->id);
            $message = 'Item added to favorites.';
        }

        // Optionally, you can emit an event or perform other actions here

        // Refresh the Livewire component to reflect changes in the UI
        $this->dispatch('favoritesUpdated');
    }

    public function addToCart()
    {
        $this->dispatch('addToCart', $this->product);
    }

    public function clickProduct()
    {
        $this->dispatch('clickProduct', $this->product->id);
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
