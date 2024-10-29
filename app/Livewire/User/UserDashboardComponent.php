<?php

namespace App\Livewire\User;

use App\Models\Billing;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $userId = Auth::id();  // Retrieve the authenticated user's ID

      

        // Fetch orders and perform calculations
        $orders = Order::where('user_id', $userId)
                       ->orderBy('created_at', 'DESC')
                       ->take(10)
                       ->get();

        // Perform aggregate calculations
        $totalCost = Order::where('user_id', $userId)
                          ->where('status', '!=', 'canceled')
                          ->sum('total');
        
        $orderPurchase = Order::where('user_id', $userId)
                              ->where('status', '!=', 'canceled')
                              ->count();

        $totalDelivered = Order::where('user_id', $userId)
                               ->where('status', 'delivered')
                               ->count();

        $totalCanceled = Order::where('user_id', $userId)
                              ->where('status', 'canceled')
                              ->count();

        return view('livewire.user.user-dashboard-component', [
            'orders' => $orders,
            'totalCost' => $totalCost,
            'orderPurchase' => $orderPurchase,
            'totalDelivered' => $totalDelivered,
            'totalCanceled' => $totalCanceled,
        ]);
    }
}
