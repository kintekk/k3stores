<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);

        if ($coupon) {
            $this->coupon_id = $coupon->id;
            $this->code = $coupon->code;
            $this->type = $coupon->type;
            $this->value = $coupon->value;
            $this->cart_value = $coupon->cart_value;
            $this->expiry_date = $coupon->expiry_date;
        } else {
            session()->flash('error', 'Coupon not found');
            return redirect()->route('admin.coupons'); // Redirect to a list or a different page
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons,code,' . $this->coupon_id,
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);
    }

    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons,code,' . $this->coupon_id,
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);

        $coupon = Coupon::find($this->coupon_id);

        if ($coupon) {
            $coupon->code = $this->code;
            $coupon->type = $this->type;
            $coupon->value = $this->value;
            $coupon->cart_value = $this->cart_value;
            $coupon->expiry_date = $this->expiry_date;
            $coupon->save();

            session()->flash('message', 'Coupon updated successfully!');
        } else {
            session()->flash('error', 'Coupon not found');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout('components.layouts.others');
    }
}
