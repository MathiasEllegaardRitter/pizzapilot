<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
   
    public $hasItemsInCart;


    public function mount()
    {
        $this->hasItemsInCart();
    }

    public function render()
    {
        $this->hasItemsInCart();
        return view('livewire.navbar')->with('hasItemsInCart', $this->hasItemsInCart); 
    }

    #[On('hasItemsInCart')]
    public function hasItemsInCart()
    {
        $cartItems = session('cart', []);
        $hasItemsInCart = count($cartItems) > 0;
        $this->hasItemsInCart = $hasItemsInCart;
    }

    public function home()
    {
        return redirect('/');;
    }

    public function cart()
    {
        $result = true;
        $this->dispatch('showCart', $result);
    }

    public function message()
    {
        return redirect('/message');;
    }

    public function favorites()
    {
        return redirect('/favorites');;
    }

    public function user()
    {
        return redirect('/profile');
    }

}
