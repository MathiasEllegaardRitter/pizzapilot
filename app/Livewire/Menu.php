<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;

class MenuComponent extends Component
{
    public function render()
    {
        $menu = Menu::where('is_active', 1)->first();
        
        return view('livewire.menu')->with('menu', $menu);
    }

}
