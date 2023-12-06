<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Product;

class Productpage extends Component
{

    public $product;
    public $count = 1;

    public $pizzaSizeButtons = [];

    public function mount($productId)
    {
        $this->product = Product::find($productId);
        $this->product->load('ingredients');

        $this->pizzaSizeButtons = [
            'Kids' => false,
            'Normal' => false,
            'Family' => false,
        ];
    }

    public function render()
    {
        // dd($this->product);
        return view('livewire.productpage')->with('product', $this->product)->with('count', $this->count)->with('pizzaSizeButtons', $this->pizzaSizeButtons);
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count --;
        }
    }

    public function pizzaSizeActive($size)
    {
        // Toggle the state for the selected size
        $this->pizzaSizeButtons[$size] = !$this->pizzaSizeButtons[$size];
        // Set rest to false, so only one size can be selected
        foreach ($this->pizzaSizeButtons as $key => $value) {
            if ($key != $size) {
                $this->pizzaSizeButtons[$key] = false;
            }
        }
    }
}
