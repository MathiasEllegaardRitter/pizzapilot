<?php

namespace App\Livewire;

use Livewire\Component;

class ReviewOrderSection extends Component
{
    public function render()
    {
        return view('livewire.review-order-section');
    }

    public function stepChanged()
    {
        $this->dispatch("stepChanged", "delivery");
    }

}
