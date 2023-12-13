<?php

namespace App\Livewire;

use Livewire\Component;

class StepsAheadSection extends Component
{

    public $step;

    public function render()
    {
        return view('livewire.steps-ahead-section')->with("step", $this->step);
    }

    public function active($step)
    {
        $this->step = $step;
        $this->dispatch('stepChanged', $this->step);
    }
}
