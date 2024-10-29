<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCouponComponent extends Component
{
    use WithPagination;
    public function deleteCoupon($coupon_id)
{
    DB::beginTransaction();

    try {
        $coupon = Coupon::find($coupon_id);

        if ($coupon) {
            // Delete the coupon record
            $coupon->delete();

            // Flash success message
            session()->flash('message', 'Coupon deleted successfully');
        } else {
            // Flash error message if the coupon is not found
            session()->flash('error', 'Coupon not found');
        }

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();

        // Log the exception
        Log::error('Error deleting coupon: ' . $e->getMessage());

        // Flash error message
        session()->flash('error', 'An error occurred while deleting the coupon');
    }
}
    public function render()
    {
        $coupons = Coupon::paginate(10);
        return view('livewire.admin.admin-coupon-component',['coupons'=>$coupons])->layout('components.layouts.others');
    }
}
