<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;


class ProductSection extends Component
{
    public Category $category;

    public function mount($category)
    {
        $this->$category = $category;
    }

    public function render()
    {
        dd("test");
        $category = $this->category;

        $products =  $category->products;

        return view('livewire.product-section')->with("products", $products);
    }
}
