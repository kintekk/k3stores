<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use  WithPagination;

    public function updateOrderStatus($order_id, $status)
    {
        // Find the order by ID
        $order = Order::find($order_id);

        // Check if the order exists
        if (!$order) {
            session()->flash('order_message', 'Order not found');
            return;
        }

        // Update the order status
        $order->status = $status;

        // Update the date fields based on the status
        if ($status == 'delivered') {
            $order->delivered_date = now(); // Use Laravel's `now()` helper for the current date and time
        } elseif ($status == 'canceled') {
            $order->canceled_date = now(); // Use Laravel's `now()` helper for the current date and time
        }

        // Save the changes to the database
        $order->save();

        // Flash a success message
        session()->flash('order_message', 'Order status updated successfully!');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at','Desc')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('components.layouts.others');
    }
}
