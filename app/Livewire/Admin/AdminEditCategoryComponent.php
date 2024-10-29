<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
public $category_id;
public $name;
public $slug;
public $scategory_id;
public $scategory_slug;
public $image;
public $newimage;
public $banner;
public $newbanner;

public function mount($category_slug, $scategory_slug = null)
{
    if ($scategory_slug) {
        $this->scategory_slug = $scategory_slug;
        $scategory = Subcategory::where('slug', $scategory_slug)->first();

        if ($scategory) {
            $this->scategory_id = $scategory->id;
            $this->category_id = $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
        }
    } else {
        $this->category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->banner = $category->banner;
        }
    }
}

public function generateslug()
{
    $this->slug = Str::slug($this->name);
}

public function updated($fields)
{
    $this->validateOnly($fields, [
        'name' => 'required',
        'slug' => 'required',
    ]);

    if ($this->newimage || $this->newbanner) {
        $this->validateOnly($fields, [
            'newimage' => 'nullable|mimes:jpeg,png',
            'newbanner' => 'nullable|mimes:jpeg,png',
        ]);
    }
}

public function updatecategory()
{
    $this->validate([
        'name' => 'required',
        'slug' => 'required',
    ]);

    if ($this->scategory_id) {
        // Update Subcategory
        $scategory = Subcategory::find($this->scategory_id);

        if ($scategory) {
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();

            session()->flash('message', 'Subcategory updated successfully');
        } else {
            session()->flash('error', 'Subcategory not found');
        }
    } else {
        // Update Category
        $category = Category::find($this->category_id);

        if ($category) {
            $category->name = $this->name;
            $category->slug = $this->slug;

            // Handle new image upload
            if ($this->newimage) {
                // Delete old image
                if ($category->image) {
                    Storage::disk('public')->delete('categories/' . $category->image);
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('categories', $imageName, 'public');
                $category->image = $imageName;
            }

            // Handle new banner upload
            if ($this->newbanner) {
                // Delete old banner
                if ($category->banner) {
                    Storage::disk('public')->delete('banners/' . $category->banner);
                }
                $bannerName = Carbon::now()->timestamp . '.' . $this->newbanner->extension();
                $this->newbanner->storeAs('banners', $bannerName, 'public');
                $category->banner = $bannerName;
            }

            $category->save();

            session()->flash('message', 'Category updated successfully');
        } else {
            session()->flash('error', 'Category not found');
        }
    }
}
    public function render()
    {
        $categories= Category::all();
        return view('livewire.admin.admin-edit-category-component',['categories'=>$categories])->layout('components.layouts.others');
    }
}
