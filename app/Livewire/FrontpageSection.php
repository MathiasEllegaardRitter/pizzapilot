<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class FrontpageSection extends Component
{
    public $showCart;
    public $showMessage;

    public $showFavorites;

    public $showCheckout;

    public $delivery;

    public function mount()
    {
        $this->showCart = false;
        $this->showMessage = false;
        $this->showFavorites = false;
    }


    public function render()
    {
        return view('livewire.frontpage-section')->with('showCart', $this->showCart)->with('showCheckout', $this->showCheckout)->with('delivery', $this->delivery);
    }

    #[On('showCart')]
    public function showCart($result)
    {
        $this->showCart = $result;
    }
    #[On('showCheckout')]
    public function showCheckout($result, $delivery)
    {
        $this->delivery = $delivery;
        $this->showCheckout = $result;
    }
}
