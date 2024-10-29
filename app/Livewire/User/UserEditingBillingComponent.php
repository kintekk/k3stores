<?php

namespace App\Livewire\User;

use App\Models\Billing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEditingBillingComponent extends Component
{
    public $firstname;
    public $lastname;
    public $phone;
    public $city;
    public $province;
    public $line1;
    public $country = "Nigeria";
    
    public function mount()
    {
        $billing = Billing::where('user_id', Auth::user()->id)->first();

        if ($billing) {
            $this->firstname = $billing->firstname;
            $this->lastname = $billing->lastname;
            $this->phone = $billing->mobile;
            $this->city = $billing->city;
            $this->province = $billing->province;
            $this->line1 = $billing->line1;
        }
    }

    public function editBilling()
    {
        // Validate input data
        $this->validate([
            'phone' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'province' => 'required',
            'line1' => 'required',
        ]);
        $billing = Billing::where('user_id', Auth::user()->id)->first();
        if ($billing) {
        // Retrieve or create a new billing record
        $billing->update([
                'mobile' => $this->phone,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'province' => $this->province,
                'line1' => $this->line1,
                'city' => $this->city,
            ]);
            session()->flash('message', 'Billing address has been saved successfully');
        }else{
                // saving in billing table
                $billing = new Billing();
                $billing->user_id = Auth::user()->id;
                $billing->firstname = $this ->firstname;
                $billing->lastname = $this-> lastname;
                $billing->email = Auth::user()->email;
                $billing->mobile = $this-> phone;
                $billing->line1 = $this-> line1;
                $billing->city = $this-> city;
                $billing->province = $this-> province;
                $billing->country = $this->country;
                $billing->save();

                 // Flash a success message
                session()->flash('message', 'Billing address has been saved successfully');
                 }
    }
    public function render()
    {
        $billing = Billing::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.user-editing-billing-component', ['billing', $billing]);
    }
}
