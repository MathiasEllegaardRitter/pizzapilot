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

    public $showProduct;


    public $currentProductId;

    public function mount()
    {
        $this->showCart = false;
        $this->showMessage = false;
        $this->showFavorites = false;
        $this->showProduct = false;
        $this->currentProductId = null;
    }

    public function render()
    {
        return view('livewire.frontpage-section')->with('showCart', $this->showCart)->with('showCheckout', $this->showCheckout)->with('delivery', $this->delivery)->with('showProduct', $this->showProduct)->with('productId', $this->currentProductId)->with('showFavorites', $this->showFavorites);
    }

    #[On('clickProduct')]
    public function setCurrentProductId($productId)
    {
        $this->currentProductId = $productId;
        $this->showProduct = true;
    }

    #[On('showFavorites')]
    public function showFavoritespage($result)
    {
        $this->showFavorites = $result;
    }


    #[On('showCart')]
    public function showCart($result)
    {
        $this->showCart = $result;
    }

    #[On('showCheckout')]
    public function showCheckout($result)
    {
        $this->showCheckout = $result;
    }

    #[On('deliveryUpdated')]
    public function deliveryUpdated($delivery)
    {
        // This is listening for a deliveryUpdated from child component cart-section
        
        if ($delivery) {
            $this->delivery =  true;
        } else {
            $this->delivery = false;
        }
    }


}
