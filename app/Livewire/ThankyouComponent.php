<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThankyouComponent extends Component
{
     public function verifyforCheckout()
    {
        if (!Auth::check())
         {
           return redirect()->route('login');
         }
        
         elseif(!session()->get('checkout'))
         {
            return redirect()->route('login');
         }
         else
         {
            return redirect()->route('thankyou');
         }
    }
    public function render()
    {
        $this->verifyforCheckout();

        return view('livewire.thankyou-component')->layout('components.layouts.others');
    }
}
