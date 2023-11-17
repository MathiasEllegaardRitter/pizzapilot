<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Menu;
use Livewire\Attributes\Reactive;

class CategorySection extends Component
{
    public Category $mainCategory;
    public $menu;
 
    public function mount($menu)
    {
        $this->menu = $menu;
        $category = new Category();
        $this->mainCategory = $category->getStartCategory($menu);
    }

    public function render()
    {
        $menu = $this->menu;
        if ($menu != null) 
        {
        $categories =$menu->products->pluck('category')->unique();

        return view('livewire.category-section')->with('categories', $categories)->with("mainCategory", $this->mainCategory);
        }

        return view('livewire.empty-category-section');
    }

    public function update($categoryId)
    {
        $category = Category::find($categoryId);

        if ($category) {
            $this->mainCategory = $category;
            $this->dispatch('mainCategoryUpdated',  $categoryId);
            $this->render();
        }
    }
}
