<?php

namespace App\Livewire;

use App\Enum\StatusEnum;
use Livewire\Component;
use App\Models\Order;
use App\Models\Item;
use App\Models\item_order;
use App\Models\product;

class OrderCreate extends Component
{

    public $items;
    public $errorMessage;


    public function mount($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('livewire.order-create');
    }
    // Need an queue and async
    public function createOrder()
    {
        if ($this->items->count() == 0) {
        $order = Order::create([
            'status' => StatusEnum::CREATED,
        ]);

        foreach ($this->items as $item) {
            Item::create([
                'product_id'=> $item['product_id'],
            ]);
            item_order::create([
                'product_id'=> $item['product_id'],
                'order_id' => $order->id
            ]);
        }
        }   else {
            $this->errorMessage = 'need items';
        }        
    }
}
