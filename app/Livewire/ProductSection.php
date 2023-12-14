<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class ProductSection extends Component
{
    public Category $mainCategory;
    public $products;

    public function mount($mainCategory)
    {
        $this->mainCategory = $mainCategory;
        $this->updateMainCategory($mainCategory->id); // Call the method to initialize $products
    }

    #[On('mainCategoryUpdated')]
    public function updateMainCategory($categoryId)
    {
        $category = new Category();
        $this->mainCategory = $category::find($categoryId);
        $this->products = $this->mainCategory->products;
    }

    public function render()
    {
        return view('livewire.product-section', [
            'products' => $this->products,
            'mainCategory' => $this->mainCategory,
        ]);
    }
}
