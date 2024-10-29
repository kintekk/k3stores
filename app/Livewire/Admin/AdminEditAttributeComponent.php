<?php

namespace App\Livewire\Admin;

use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminEditAttributeComponent extends Component
{
    public $name;
public $attribute_id;

public function mount($attribute_id)
{
    $this->attribute_id = $attribute_id;

    // Ensure that the attribute exists
    $pattribute = ProductAttribute::find($attribute_id);

    if ($pattribute) {
        $this->name = $pattribute->name;
    } else {
        // Handle the case where the attribute is not found
        session()->flash('error', 'Attribute not found');
        return redirect()->route('admin.attributes'); // Redirect or handle as appropriate
    }
}

public function updated($fields)
{
    $this->validateOnly($fields, [
        'name' => 'required'
    ]);
}

public function updateAttribute()
{
    $this->validate([
        'name' => 'required'
    ]);

    DB::beginTransaction();

    try {
        $pattribute = ProductAttribute::find($this->attribute_id);

        if ($pattribute) {
            $pattribute->name = $this->name;
            $pattribute->save();

            session()->flash('message', 'Attribute edited successfully');
        } else {
            session()->flash('error', 'Attribute not found');
        }

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();

        // Log the exception for debugging
        Log::error('Error updating attribute: ' . $e->getMessage());

        // Flash error message
        session()->flash('error', 'An error occurred while updating the attribute');
    }
}
    public function render()
    {
        return view('livewire.admin.admin-edit-attribute-component')->layout('components.layouts.others');
    }
}
