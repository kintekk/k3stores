<?php

namespace App\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {
        $sale = Sale::find(1); // Find sale with ID 1

        if ($sale) {
            // If sale exists, assign its properties to component properties
            $this->sale_date = $sale->sale_date;
            $this->status = $sale->status;
        } else {
            // Handle the case where sale does not exist
            $this->sale_date = null;
            $this->status = null;
        }
    }

    public function updateSale()
    {
        // Find sale with ID 1
        $sale = Sale::find(1);

        if ($sale) {
            // If sale exists, update its properties
            $sale->sale_date = $this->sale_date;
            $sale->status = $this->status;
            $sale->save();
            session()->flash('message', 'Record has been updated successfully');
        } else {
            // Handle the case where sale does not exist
            session()->flash('error', 'Sale record not found');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('components.layouts.others');
    }
}
