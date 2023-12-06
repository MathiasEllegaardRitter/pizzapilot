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
 
    public function mount($menu, $mainCategory)
    {
        $this->menu = $menu;
        $this->mainCategory = $mainCategory;
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

    protected $listeners = ['scrollTo' => 'scrollTo'];

    public function scrollTo($position)
    {
        $this->scrollPosition = $position;
        $this->render();
    }

    public function update($categoryId)
    {
        // Your existing update logic
        $category = Category::find($categoryId);
    
        if ($category) {
            $this->mainCategory = $category;
    
            $this->dispatch('mainCategoryUpdated', $categoryId);
            $this->render();
        }
    }

    public $scrollPosition = 0;
    public bool $showLeftArrow = false;


    public function scrollLeft()
    {
        // Decrease the scroll position
        $this->scrollPosition -= 200;
        $this->showLeftArrow = $this->scrollPosition > 0;
        // Ensure the scroll position is not negative
        $this->scrollPosition = max(0, $this->scrollPosition);
    
        // Emit Livewire event to scroll to the updated position
        $this->dispatch('smoothScrollTo', $this->scrollPosition);
    }

    public function scrollRight()
    {
        // Increase the scroll position
        $this->scrollPosition += 200;
    
        // Emit Livewire event to scroll to the updated position
        $this->dispatch('smoothScrollTo', $this->scrollPosition);
    }
}
