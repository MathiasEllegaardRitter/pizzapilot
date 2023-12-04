<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutSection extends Component
{

    public $delivery;


    public function mount($delivery)
    {
        $this->$delivery = $delivery;
    }
    public function render()
    {
        return view('livewire.checkout-section')->with('delivery', $this->delivery);
    }


    public function closeCheckout()
    {
        $this->dispatch('showCheckout', false);
    }
}
