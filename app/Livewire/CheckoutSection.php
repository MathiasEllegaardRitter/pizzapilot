<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CheckoutSection extends Component
{

    public $delivery;

    public $step;

    public function mount()
    {
        $this->step = "review";
    }
    
    public function render()
    {
        return view('livewire.checkout-section')->with('delivery', $this->delivery)->with('step', $this->step);
    }


    public function closeCheckout()
    {
        $this->dispatch('showCheckout', false);
    }

    #[On('stepChanged')]
    public function stepChanged($result)
    {
        $this->step = $result;
    }


}
