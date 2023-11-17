<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;
use Livewire\Attributes\On;

class MenuSection extends Component
{

    public Category $mainCategory;
    public Menu $menu;

    #[On('mainCategoryUpdated')]
    public function updateMainCategory($categoryId)
    {
        $category = new Category();
        $this->mainCategory = $category::find($categoryId);
    }

    public function mount()
    {
        $this->menu = Menu::where('is_active', 1)->first();
        $category = new Category();
        $this->mainCategory = $category->getStartCategory($this->menu);
    }

    public function render()
    {
        $menu = $this->menu;

        if ($menu != null) 
        {
            return view('livewire.menu-section')->with('menu', $menu)->with("mainCategory", $this->mainCategory);
        }

        return view('livewire.empty-menu-section');
    }

    
}
