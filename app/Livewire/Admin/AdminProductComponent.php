<?php

namespace App\Livewire\Admin;

use App\Events\ProductDeleted;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        try {
            // Find the product by ID or fail if not found
            $product = Product::findOrFail($id);
    
            // Delete the main image if it exists
            if ($product->image) {
                $mainImagePath = 'shop/' . $product->image;
                if (Storage::disk('public')->exists($mainImagePath)) {
                    Storage::disk('public')->delete($mainImagePath);
                }
            }
    
            // Delete additional images if they exist
            if ($product->images) {
                $images = explode(",", $product->images);
                foreach ($images as $image) {
                    $imagePath = 'gallery/' . $image;
                    if ($image && Storage::disk('public')->exists($imagePath)) {
                        Storage::disk('public')->delete($imagePath);
                    }
                }
            }
    
            // Delete the product record
            $product->delete();
    
            // Dispatch the ProductDeleted event
            event(new ProductDeleted($product->id));
    
            // Clear specific session data if necessary
            session()->forget('product_id');
    
            // Set a success flash message
            session()->flash('message', 'Product deleted successfully');
        } catch (\Exception $e) {
            // Handle errors and set an error flash message
            session()->flash('error', 'Error deleting product: ' . $e->getMessage());
        }
    }
    

    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('components.layouts.others');
    }
}
