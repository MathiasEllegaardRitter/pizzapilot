<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Menu;

class CategorySection extends Component
{
    public Category $mainCatogry;

    public $menu;
 
    public function mount($menu)
    {
        $this->menu = $menu;
    }

    public function render()
    {
        $menu = $this->menu;
        
        if ($menu != null) 
        {
        $products = $menu->products;
        $categories =$menu->products->pluck('category')->unique();

        return view('livewire.category-section')->with('products', $products)->with('categories', $categories);
        }

        return view('livewire.empty-category -section');
    }

    public function update()
    {

    }
}
