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
            return view('livewire.menu-section')->with('menu', $menu);
        }

        return view('livewire.empty-menu-section');
    }

}
