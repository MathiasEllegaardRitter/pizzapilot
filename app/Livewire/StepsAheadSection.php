<?php

namespace App\Livewire;

use Livewire\Component;

class StepsAheadSection extends Component
{

    public $step = 'review';

    public $isDelivery;

    public function mount($delivery)
    {
        // dd($delivery);
        $this->isDelivery = $delivery;
    }

    public function render()
    {
        return view('livewire.steps-ahead-section')->with("step", $this->step)->with('isDelivery', $this->isDelivery);
    }
    
    public function active($step)
    {
        $this->step = $step;
        $this->dispatch('stepChanged', $this->step);
    }
}
