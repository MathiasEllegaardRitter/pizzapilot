<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar');

        
    }

    public function home()
    {
        return redirect('/');;
    }

    public function cart()
    {
        return redirect('/cart');;
    }

    public function message()
    {
        return redirect('/message');;
    }

    public function favorites()
    {
        return redirect('/favorites');;
    }

    public function user()
    {
        return redirect('/profile');
    }

}
