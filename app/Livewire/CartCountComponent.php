<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCountComponent extends Component
{
    public function checkout()
    {;
        if (Auth::check())
         {
           return redirect()->route('checkout');
        }
        else 
        {
            return redirect()->route('login');
        }
    }

    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
