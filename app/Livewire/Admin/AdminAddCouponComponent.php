<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    // Validate on field update
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);
    }

    // Store coupon
    public function storeCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons,code',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);

        try {
            $coupon = new Coupon();
            $coupon->code = $this->code;
            $coupon->type = $this->type;
            $coupon->value = $this->value;
            $coupon->cart_value = $this->cart_value;
            $coupon->expiry_date = $this->expiry_date;
            $coupon->save();

            session()->flash('message', 'Coupon added successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error adding the coupon. Please try again.');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('components.layouts.others');
    }
}
