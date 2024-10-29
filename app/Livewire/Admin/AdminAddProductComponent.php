<?php

namespace App\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminAddProductComponent extends Component
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
    public $images = [];
    public $scategory_id;
    public $attribute;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values = [];

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'SKU' => 'required|string|max:255',
            'stock_status' => 'required|in:instock,outofstock',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'scategory_id' => 'nullable|exists:subcategories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Allowing images to be optional
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName === 'name') {
            $this->generateslug();
        }
    }

    public function add()
    {
        if (!in_array($this->attribute, $this->attribute_arr) && $this->attribute) {
            $this->inputs[] = $this->attribute;
            $this->attribute_arr[] = $this->attribute;
            $this->attribute = null; // Clear selection after adding
        }
    }

    public function remove($index)
    {
        unset($this->inputs[$index]);
        unset($this->attribute_arr[$index]);
        $this->inputs = array_values($this->inputs); // Re-index the array
        $this->attribute_arr = array_values($this->attribute_arr); // Re-index the array
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function addproduct()
    {
        try {
            // Validate the inputs
            $this->validate();
    
            // Create a new product instance
            $product = new Product();
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
    
            // Handle single image upload
            if ($this->image) {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('shop', $imageName, 'public');
                $product->image = $imageName;
            }
    
            // Handle multiple images upload
            if ($this->images) {
                $imagesNames = [];
                foreach ($this->images as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('gallery', $imgName, 'public');
                    $imagesNames[] = $imgName;
                }
                $product->images = implode(',', $imagesNames);
            }
    
            $product->category_id = $this->category_id;
            if ($this->scategory_id) {
                $product->subcategory_id = $this->scategory_id;
            }
    
            // Debugging: Check product data before saving
            // dd($product);
    
            // Save the product
            $product->save();
    
            // Handle attributes
            foreach($this->attribute_values as $key=>$attribute_value)
            {
                $avalues = explode(",", $attribute_value);
                foreach($avalues as $avalue)
                {
                    $attr_value = new Attributevalue();
                    $attr_value->product_attribute_id = $key;
                    $attr_value->value = $avalue;
                    $attr_value->product_id = $product->id;
                    $attr_value->save();
                }
            }
    
            // Flash success message and redirect
            session()->flash('message', 'Product created successfully');
            return redirect()->route('admin.products');
        } catch (\Exception $e) {
            // Log and display error
            \Log::error('Error creating product: ' . $e->getMessage());
            session()->flash('error', 'Failed to create product');
            // Optionally redirect or handle the error differently
        }
    }
    

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }


    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-component', [
            'categories' => $categories,
            'scategories' => $scategories,
            'pattributes' => $pattributes
        ])->layout('components.layouts.others');
    }
}
