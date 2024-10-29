<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    // Properties to store data for the view
    public $orders;
    public $totalSales;
    public $totalRevenue;
    public $todaySales;
    public $todayRevenue;

    public function mount()
    {
        $this->loadDashboardData();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('components.layouts.others');
    }

    /**
     * Load data for the dashboard.
     *
     * @return void
     */
    protected function loadDashboardData()
    {
        // Retrieve the latest 10 orders
        $this->orders = Order::latest()->take(10)->get();

        // Get today's date
        $today = Carbon::today()->toDateString();

        // Aggregate data
        $stats = Order::selectRaw('
            COUNT(*) AS total_sales,
            SUM(total) AS total_revenue,
            SUM(CASE WHEN DATE(created_at) = ? THEN total ELSE 0 END) AS today_revenue,
            COUNT(CASE WHEN DATE(created_at) = ? THEN 1 END) AS today_sales
        ', [$today, $today])
        ->where('status', 'delivered')
        ->first() ?? (object) [
            'total_sales' => 0,
            'total_revenue' => 0,
            'today_sales' => 0,
            'today_revenue' => 0
        ];

        // Assign data to properties
        $this->totalSales = $stats->total_sales;
        $this->totalRevenue = $stats->total_revenue;
        $this->todaySales = $stats->today_sales;
        $this->todayRevenue = $stats->today_revenue;
    }
}
