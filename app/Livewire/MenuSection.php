<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;
use Livewire\Attributes\On;
use Stevebauman\Location\Facades\Location;

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
        $ip = '92.43.73.5'; /* Static IP address */
        $currentUserInfo = Location::get($ip);
        dd($currentUserInfo);

    
        // Får pizza store med DeliveryChecker, går igennem zipcodes. 
        // hvis den er er rigtig.
        // Send menuen med pizzastore der er active.
        //



        // Get pizzastore where it is most likely active.
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
