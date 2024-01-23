<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;
use Livewire\Attributes\On;
use Stevebauman\Location\Facades\Location;
use App\Models\PizzaStore;
use Exception;
use Illuminate\Http\Request;


class MenuSection extends Component
{

    public Category $mainCategory;
    public Menu $menu;
    public bool $found;
    public string $errorMessage;

    public $ip = '92.43.73.5'; /* true case */
    // public $ip = '67.97.38.151';  /* error case */

    #[On('mainCategoryUpdated')]
    public function updateMainCategory($categoryId)
    {
        $category = new Category();
        $this->mainCategory = $category::find($categoryId);
    }

    public function mount()
    {
        // $this->ip = $this->setIp();
        $this->found = false;
        try
        {
             // Get the location
            $currentUserInfo = Location::get($this->ip);

             // Sets the zipcode, to a variable.
            $zipcode = $currentUserInfo->zipCode;

            // Search for a pizzastore with zipcode
            $pizzaStore = $this->searchForPizzaStore($zipcode);

            if (!$pizzaStore) {
                // If no pizzaStore end method, and handle menu
                $this->handleNoPizzaStore();
                 return;
            }
             // The $pizzaStore variable now contains the PizzaStore associated with the provided Zipcode.
            $this->setMenuFromPizzaStore($pizzaStore);

            if(!$this->menu)
            {
                // If no menu end method, and handle menu
                $this->handleNoMenu();
                return;
            }
            // Set the category so it can be displayed
            $this->setCategoryFromMenu();

            $this->found = true;
        } catch(Exception $e) {
            $this->found = false;
        }
    }

    private function handleNoPizzaStore()
    {
        $this->found = false;
        $this->errorMessage = "There's no pizza store to your location";
    }

    private function handleNoMenu()
    {
        $this->found = false;
        $this->errorMessage = "There's no menu to your location";
    }

    private function searchForPizzaStore($zipcode)
    {
        $pizzaStore = PizzaStore::whereHas('delivery_checkers.zipcode', function ($query) use ($zipcode) {
            $query->where('zipcodes.zipcode', $zipcode);
        })->first();

        return $pizzaStore;
    }

    public function setMenuFromPizzaStore($pizzaStore)
    {
        $this->menu = $pizzaStore->menus()->where('is_active', 1)->first();

        return $this->menu;
    }

    private function setCategoryFromMenu()
    {
        $category = new Category();
        $this->mainCategory = $category->getStartCategory($this->menu);
    }

    private function setIp()
    {
        $this->ip = request()->ip();
    }

    public function render()
    {
        try
        {
            if($this->found == true)
            {
                if ($this->menu != null) 
                {
                     return view('livewire.menu-section')->with('menu', $this->menu)->with("mainCategory", $this->mainCategory);
                }
             } else {
                return view('livewire.empty-menu-section')->with("errorMessage", $this->errorMessage);
            }
        } catch(Exception $e) {
            return view('livewire.empty-menu-section')->with("errorMessage", $e->getMessage());
        } 
    }    
}
