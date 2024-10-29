<?php

namespace App\Livewire\User;

use App\Models\Billing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserBillingComponent extends Component
{
    public function render()
    {
        $userId = Auth()->user()->id;
          // Fetch the billing information
        $billing = Billing::where('user_id', $userId)->first();
        return view('livewire.user.user-billing-component',['billing' => $billing]);
    }
}
