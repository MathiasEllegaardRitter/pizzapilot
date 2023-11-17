<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;


class MenuSection extends Component
{
    public function render()
    {


        $menu = Menu::where('is_active', 1)->first();

        if ($menu != null) 
        {
        $products = $menu->products;
        $categories =$menu->products->pluck('categories')->unique();
        
        return view('livewire.menu-section')->with('products', $products)->with('categories', $categories);
        }

        return view('livewire.empty-menu-section');
    }

}
