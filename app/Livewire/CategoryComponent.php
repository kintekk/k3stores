<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;
    public $category_slug;
    public $scategory_slug;
    public $min_price;
    public $max_price;

    public function mount($category_slug, $scategory_slug = null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
        $this->min_price = 1;
        $this->max_price = 1000000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to the cart');
        // Optionally redirect to cart page
        // return redirect()->route('product.cart');
    }

    public function render()
    {
        $category_id = null;
        $category_name = "";
        $category_image = "";

        if ($this->scategory_slug) {
            $subcategory = Subcategory::where('slug', $this->scategory_slug)->first();
            if ($subcategory) {
                $category_id = $subcategory->id;
                $category_name = $subcategory->name;
            }
        } else {
            $category = Category::where('slug', $this->category_slug)->first();
            if ($category) {
                $category_id = $category->id;
                $category_name = $category->name;
                $category_image = $category->banner;
            }
        }

        $products = $this->getProducts();

        $categories = Category::all();

        return view('livewire.category-component', [
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name,
            'category_image' => $category_image
        ])->layout('components.layouts.others');
    }
    protected function getProducts()
    {
        $query = Product::whereBetween('regular_price', [$this->min_price, $this->max_price]);

        if ($this->category_slug) {
            $filter = $this->scategory_slug ? 'subcategory_id' : 'category_id';
            $category_id = $this->scategory_slug ? Subcategory::where('slug', $this->scategory_slug)->value('id') : Category::where('slug', $this->category_slug)->value('id');
            $query->where($filter, $category_id);
        }

        switch ($this->sorting) {
            case 'date':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'price-low':
                $query->orderBy('regular_price', 'ASC');
                break;
            case 'price-high':
                $query->orderBy('regular_price', 'DESC');
                break;
            default:
                break;
        }

        return $query->paginate($this->pagesize);
    }
}
