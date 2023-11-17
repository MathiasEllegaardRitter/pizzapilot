<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class ProductSection extends Component
{
    public Category $mainCategory;
    public $products;

    #[On('mainCategoryUpdated')]
    public function updateMainCategory($categoryId)
    {
        $category = new Category();
        $this->mainCategory = $category::find($categoryId);
        $this->products = $this->mainCategory->products;
    }

    public function mount($mainCategory)
    {
        $this->mainCategory = $mainCategory;
    }

    public function render()
    {
        $category = $this->mainCategory;

        $products = $category->products;
        $this->products = $products;

        return view('livewire.product-section')->with("products", $this->products);
    }
}
