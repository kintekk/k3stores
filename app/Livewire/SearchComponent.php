<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $sorting = 'default';
    public $pagesize = 12;
    public $search = '';
    public $product_cat = '';
    public $product_cat_id = '';

    public function mount()
    {
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->product_cat_id) {
            $query->where('category_id', $this->product_cat_id);
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
                // Default sorting or no sorting
                break;
        }

        $products = $query->paginate($this->pagesize);
        $categories = Category::all();
        return view('livewire.search-component', [
            'products' => $products,
            'categories' => $categories
        ])->layout('components.layouts.others');
    }
}
