<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        DB::beginTransaction();

        try {
            $category = Category::find($id);

            if ($category) {
                // Delete image from storage if it exists
                if ($category->image) {
                    Storage::disk('public')->delete('categories/' . $category->image);
                }

                // Delete banner from storage if it exists
                if ($category->banner) {
                    Storage::disk('public')->delete('banners/' . $category->banner);
                }

                // Delete the category record
                $category->delete();

                // Flash success message
                session()->flash('message', 'Category deleted successfully');
            } else {
                // Flash error message if the category is not found
                session()->flash('error', 'Category not found');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log exception and flash error message
            \Log::error('Error deleting category: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting the category');
        }
    }

    public function deleteSubcategory($id)
    {
        DB::beginTransaction();

        try {
            $subcategory = Subcategory::find($id);

            if ($subcategory) {
                // Delete the subcategory record
                $subcategory->delete();

                // Flash success message
                session()->flash('message', 'Subcategory deleted successfully');
            } else {
                // Flash error message if the subcategory is not found
                session()->flash('error', 'Subcategory not found');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log exception and flash error message
            \Log::error('Error deleting subcategory: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while deleting the subcategory');
        }
    }

    public function render()
    {
        $categories = Category::paginate(8);
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('components.layouts.others');
    }
}
