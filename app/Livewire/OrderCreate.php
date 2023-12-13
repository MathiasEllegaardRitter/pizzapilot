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

    public function mount($items, $delivery)
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
        // if (count($this->items) >= 0) {
        // $order = Order::create([
        //     'status' => StatusEnum::CREATED,
        // ]);
        
        // foreach ($this->items as $item) {
        //     $newItem = Item::create([
        //         'product_id'=> $item['product_id'],
        //     ]);
        //     item_order::create([
        //         'item_id'=> $newItem->id,
        //         'order_id' => $order->id
        //     ]);
        // }
        // }   else {
        //     $this->errorMessage = 'need items';
        // }
        $this->dispatch("closeCart");
        $this->dispatch('showCheckout', true);
    }
}
