<?php

namespace App\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributeComponent extends Component
{
    public function deleteAttribute($attribute_id)
{
    // Find the attribute by ID
    $pattribute = ProductAttribute::find($attribute_id);

    // Check if attribute exists
    if ($pattribute) {
        try {
            // Delete the attribute
            $pattribute->delete();
            
            // Flash a success message
            session()->flash('message', 'Attribute deleted successfully');
        } catch (\Exception $e) {
            // Flash an error message
            session()->flash('error', 'An error occurred while deleting the attribute');
        }
    } else {
        // Flash a message if the attribute was not found
        session()->flash('error', 'Attribute not found');
    }
}

    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attribute-component',['pattributes'=>$pattributes])->layout('components.layouts.others');
    }
}
