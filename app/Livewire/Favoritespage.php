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
    public $showCart;

    public $products;

    public function mount()
    {
        $this->showCart = false;
    }

    #[On('showCart')]
    public function showCart($result)
    {
        $this->showCart = $result;
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
