<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Item;
use App\Models\item_order;
use App\Models\product;

class OrderCreate extends Component
{

    public $items;


    public function mount($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('livewire.order-create');
    }

    public function createOrder()
    {
        foreach ($this->items as $item) {
            Item::create([
                'product_id'=> $item['product_id'],
            ]);
        }
    }
}
