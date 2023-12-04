<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use App\Models\Item;


class OrderHistory extends Component
{

    public $orders;
    public function render()
    {
        $user = auth()->user();     
        $customer = $user->customer;
        // $customer->load('orders.items');
        if($customer) 
        { 
            // $customer->load();
            $this->orders = $customer->orders;
        }
        
        return view('livewire.order-history')->with('orders', $this->orders);
        
    }
}
