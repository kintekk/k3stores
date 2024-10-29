<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\homeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;
    
    public function mount()
    {
        // Find the HomeCategory with ID 1
        $category = HomeCategory::find(1);

        if ($category) {
            // Ensure sel_categories is not null before attempting to explode
            $this->selected_categories = $category->sel_categories ? explode(',', $category->sel_categories) : [];
            $this->numberofproducts = $category->no_of_products;
        } else {
            // Handle the case when the category is not found
            $this->selected_categories = [];
            $this->numberofproducts = 0;
        }
    }

    public function updateHomeCategory()
    {
        $this->validate([
            'numberofproducts' => 'required|numeric',
        ]);

        // Find the HomeCategory with ID 1
        $category = homeCategory::find(1);

        if ($category) {
            // Save the selected categories and number of products
            $category->sel_categories = implode(',', $this->selected_categories);
            $category->no_of_products = $this->numberofproducts;
            $category->save();
            session()->flash('message', 'HomeCategory successfully updated');
        } else {
            // Handle the case when the category is not found
            session()->flash('error', 'HomeCategory not found');
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component', ['categories' => $categories])->layout('components.layouts.others');
    }
}
