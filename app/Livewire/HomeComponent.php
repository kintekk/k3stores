<?php
namespace App\Livewire;

use App\Models\Category;
use App\Models\homeCategory;
use App\Models\homeSlider;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        // Add the product to the cart and associate it with the Product model
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)
            ->associate('App\Models\Product');
        
        // Provide a success message and refresh the cart count component
        session()->flash('success_message', 'Item added to the cart');
        $this->dispatch('refreshComponent'); 

        // Redirect to the cart page
        return redirect()->route('product.cart');
    }

    public function render()
    {
        // Fetch data for the homepage
        $slider = homeSlider::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->take(8)->get();
        $fproducts = Product::where('features', 1)->get();
        $pproducts = Product::inRandomOrder()->limit(8)->get();
        $category = homeCategory::find(1);
    
        if ($category) {
            $cats = explode('.', $category->sel_categories);
            $categories = Category::whereIn('id', $cats)->get();
            $no_of_products = $category->no_of_products;
        } else {
            $cats = [];
            $categories = collect(); // Empty collection
            $no_of_products = 0;
        }
    
        $sproducts = Product::where('sale_price', '>', 0)->inRandomOrder()->take(8)->get();
        $topsellingproduct1 = Product::where('category_id', 1)->inRandomOrder()->take(3)->get();
        $topsellingproduct2 = Product::where('category_id', 3)->inRandomOrder()->take(3)->get();
        $topsellingproduct3 = Product::where('category_id', 4)->inRandomOrder()->take(3)->get();
        $sale = Sale::find(1);

       // Restore cart for authenticated users
        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email);
        }
    
        // Return the view with data
        return view('livewire.home-component', [
            'slider' => $slider,
            'lproducts' => $lproducts,
            'fproducts' => $fproducts,
            'pproducts' => $pproducts,
            'sproducts' => $sproducts,
            'categories' => $categories,
            'no_of_products' => $no_of_products,
            'sale' => $sale,
            'topsellingproduct1' => $topsellingproduct1,
            'topsellingproduct2' => $topsellingproduct2,
            'topsellingproduct3' => $topsellingproduct3
        ]);
    }
}
