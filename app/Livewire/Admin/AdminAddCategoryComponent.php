<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $banner;
    public $subcategory;
    public $category_id;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $this->category_id,
            'image' => 'nullable|mimes:jpeg,png',
            'banner' => 'nullable|mimes:jpeg,png',
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $this->category_id,
            'image' => 'nullable|mimes:jpeg,png',
            'banner' => 'nullable|mimes:jpeg,png',
        ]);

        if ($this->category_id) {
            // Adding a subcategory
            $subcategory = new Subcategory();
            $subcategory->name = $this->name;
            $subcategory->slug = $this->slug;
            $subcategory->category_id = $this->category_id;
            $subcategory->save();
            
            session()->flash('message', 'Subcategory created successfully');
        } else {
            // Adding a new category
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;

            if ($this->image) {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('categories', $imageName, 'public');
                $category->image = $imageName;
            }

            if ($this->banner) {
                $bannerName = Carbon::now()->timestamp . '.' . $this->banner->extension();
                $this->banner->storeAs('banners', $bannerName, 'public');
                $category->banner = $bannerName;
            }

            $category->save();
            session()->flash('message', 'Category created successfully');
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component', ['categories' => $categories])->layout('components.layouts.others');
    }
}
