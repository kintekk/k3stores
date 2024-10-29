<?php

namespace App\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;
    public $images = [];
    public $newimages = [];
    public $scategory_id;
    public $attribute;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->firstOrFail();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_desc;
        $this->description = $product->desc;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->features;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",", $product->images);
        $this->category_id = $product->category_id;
        $this->scategory_id = $product->subcategory_id;
        $this->inputs = $product->attributeValues->pluck('product_attribute_id')->unique()->toArray();

        foreach ($this->inputs as $attribute_id) {
            $values = AttributeValue::where('product_id', $product->id)
                                    ->where('product_attribute_id', $attribute_id)
                                    ->pluck('value')
                                    ->implode(' ,');
            $this->attribute_values[$attribute_id] = rtrim($values, ' ,');
        }
    }

    public function add()
    {
        if (!in_array($this->attribute, $this->attribute_arr)) {
            $this->inputs[] = $this->attribute;
            $this->attribute_arr[] = $this->attribute;
        }
    }

    public function remove($attribute_id)
    {
        $this->inputs = array_filter($this->inputs, function ($value) use ($attribute_id) {
            return $value != $attribute_id;
        });
        $this->attribute_arr = array_filter($this->attribute_arr, function ($value) use ($attribute_id) {
            return $value != $attribute_id;
        });
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required'
        ]);

        if ($this->newimage) {
            $this->validateOnly($fields, [
                'newimage' => 'nullable|image|mimes:jpeg,png',
            ]);
        }
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required'
        ]);

        $product = Product::find($this->product_id);
        if ($product) {
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_desc = $this->short_description;
            $product->desc = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->SKU = $this->SKU;
            $product->stock_status = $this->stock_status;
            $product->features = $this->featured;
            $product->quantity = $this->quantity;
            $product->category_id = $this->category_id;
            $product->subcategory_id = $this->scategory_id ?? null;

            if ($this->newimage) {
                Storage::disk('public')->delete('shop/' . $product->image);
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('shop', $imageName, 'public');
                $product->image = $imageName;
            }

            if ($this->newimages) {
                $oldImages = explode(",", $product->images);
                foreach ($oldImages as $oldImage) {
                    if ($oldImage) {
                        Storage::disk('public')->delete('gallery/' . $oldImage);
                    }
                }

                $newImagesNames = [];
                foreach ($this->newimages as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('gallery', $imgName, 'public');
                    $newImagesNames[] = $imgName;
                }
                $product->images = implode(',', $newImagesNames);
            }

            $product->save();

            // Update attributes
            AttributeValue::where('product_id', $product->id)->delete();
            foreach ($this->attribute_values as $attribute_id => $attribute_value) {
                $values = explode(" ,", $attribute_value);
                foreach ($values as $value) {
                    AttributeValue::create([
                        'product_attribute_id' => $attribute_id,
                        'value' => $value,
                        'product_id' => $product->id,
                    ]);
                }
            }

            session()->flash('message', 'Product updated successfully');
        } else {
            session()->flash('error', 'Product not found');
        }
    }

    public function changeSubcategory()
    {
        $this->scategory_id = null;
    }

    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-edit-product-component', [
            'categories' => $categories,
            'scategories' => $scategories,
            'pattributes' => $pattributes
        ])->layout('components.layouts.others');
    }
}
