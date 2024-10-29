<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        
        $this->min_price=1;
        $this->max_price=1000000;
    }
    

    public function store($product_id, $product_name, $product_price)
    {
        $product = Product::find($product_id);

        if ($product->stock_status == "outofstock") {
            session()->flash('message', 'This product is out of stock.');
            return;
        }

        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to the cart');
        $this->dispatch('refreshComponent');
    }


    // public function addToWishlist($product_id, $product_name, $product_price)
    // {
    //     Cart::instance('wishlist')->add($product_id,$product_name,1, $product_price)->associate('App\Models\Product');
    // }


    public function render()
    {
        if($this->sorting == 'date')
        {
        $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-low')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif ($this->sorting == 'price-high')
         {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize); 
        }
        else
         {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize); 
        }

        $categories = Category::all();

        if (Auth::check())
        {
          Cart::instance('cart')->store(Auth::user()->email);
        }
        
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories])->layout('components.layouts.others');
    }
}
