<?php

namespace App\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAtrributeComponent extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }


    public function storeAttribute()
    {
        $this->validate($this->rules);

        try {
            $pattributes = new ProductAttribute();
            $pattributes->name = $this->name;
            $pattributes->save();
            
            session()->flash('message', __('Attribute created successfully'));
            $this->reset('name'); // Reset input field after save
        } catch (\Exception $e) {
            // Log the error or show an error message
            session()->flash('error', __('An error occurred while creating the attribute'));
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-add-atrribute-component')->layout('components.layouts.others');
    }
}
