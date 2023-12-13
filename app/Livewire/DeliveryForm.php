<?php

namespace App\Livewire;

use Livewire\Component;

class DeliveryForm extends Component
{
    
    public $email;
    public $street;
    public $name;
    public $phone;
    public $comment;
    public $order;

    public function render()
    {
        return view('livewire.delivery-form');
    }

    public function submitForm()
    {

    }
}
