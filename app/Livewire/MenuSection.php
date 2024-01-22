<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;
use Livewire\Attributes\On;
use Stevebauman\Location\Facades\Location;
use App\Models\PizzaStore;

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

        // Får pizza store med DeliveryChecker, går igennem zipcodes.
        $zipcode = $currentUserInfo->zipCode;

        $pizzaStore = PizzaStore::whereHas('delivery_checkers.zipcode', function ($query) use ($zipcode) {
            $query->where('zipcodes.zipcode', $zipcode);
        })->first();

        if ($pizzaStore) {
            // The $pizzaStore variable now contains the PizzaStore associated with the provided Zipcode.
            // You can proceed with any further processing you need.
            dd($pizzaStore);

            $this->menu = Menu::where('is_active', 1)->first();
            $category = new Category();
            $this->mainCategory = $category->getStartCategory($this->menu);
            
        } else {
            // Handle the case where a PizzaStore is not found for the given Zipcode.
            dd("false");
        }


        // hvis den er er rigtig.
        // Send menuen med pizzastore der er active.
        // 
        // Get pizzastore where it is most likely active.
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
