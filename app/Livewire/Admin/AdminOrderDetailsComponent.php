<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function updateOrderStatus($status)
    {
        // Find the order by ID
        $order = Transaction::find($this->order_id);

        // Check if the order exists
        if (!$order) {
            session()->flash('order_message', 'Order not found');
            return;
        }

        // Update the order status
        $order->status = $status;

        // Update the updated_at field based on the status
        if (in_array($status, ['approved', 'declined', 'refunded'])) {
            $order->updated_at = now(); // Use Laravel's now() helper for current date and time
        }

        // Save the changes to the database
        $order->save();

        // Flash a success message
        session()->flash('order_message', 'Order status updated successfully!');
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.admin.admin-order-details-component',['order'=>$order])->layout('components.layouts.others');
    }
}
