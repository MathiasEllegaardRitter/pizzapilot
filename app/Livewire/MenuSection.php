<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;
use Livewire\Attributes\On;
use Stevebauman\Location\Facades\Location;
use App\Models\PizzaStore;
use Exception;

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

        try
        {
        $ip = '92.43.73.5'; /* true case */
        // $ip = '67.97.38.151'; /* error case */

        // Get the location
        $currentUserInfo = Location::get($ip);

        // Sets the zipcode, to a variable.
        $zipcode = $currentUserInfo->zipCode;

        // Search for a pizzastore with zipcode
        $pizzaStore = PizzaStore::whereHas('delivery_checkers.zipcode', function ($query) use ($zipcode) {
            $query->where('zipcodes.zipcode', $zipcode);
        })->first();

        if ($pizzaStore) {
            // The $pizzaStore variable now contains the PizzaStore associated with the provided Zipcode.

            $this->menu = $pizzaStore->menus()->where('is_active', 1)->first();

            if($this->menu)
            {
                $category = new Category();
                $this->mainCategory = $category->getStartCategory($this->menu);  
            } 
            else
            {
                // Handle case if no menu
            }
        } else {
            // Handle case if no Pizzastore
            dd("false");
        }
        } catch(Exception $e) {
            dd($e->getMessage());
        }
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
