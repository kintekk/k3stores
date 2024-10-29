<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class ProductComponent extends Component
{
    public $slug;
    public $qty = 1; // Default quantity

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function increaseQuantity()
    {
        $this->qty++;
        $this->dispatch('refreshComponent');
    }

    public function decreaseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
            $this->dispatch('refreshComponent');
        } else {
            session()->flash('error_message', 'Quantity cannot be less than 1.');
        }
    }

    public function store($product_id, $product_name, $product_price)
{
    // Validate product ID
    $product = Product::find($product_id);
    if (!$product) {
        session()->flash('error_message', 'Product not found.');
        return;
    }

    // Retrieve all items from the cart
    $cartItems = Cart::instance('cart')->content();

    // Check if the product is already in the cart
    $existingCartItem = $cartItems->firstWhere('id', $product_id);

    if ($existingCartItem) {
        // Update the quantity
        $newQuantity = $existingCartItem->qty + $this->qty;

        if ($newQuantity > 0) {
            // Update the cart item with the new quantity
            Cart::instance('cart')->update($existingCartItem->rowId, $newQuantity);
            session()->flash('success_message', 'Item quantity updated in the cart.');
        } else {
            // If quantity is zero or less, remove the item
            Cart::instance('cart')->remove($existingCartItem->rowId);
            session()->flash('success_message', 'Item removed from the cart.');
        }
    } else {
        // If the product does not exist in the cart, add it
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)
            ->associate('App\Models\Product');

        session()->flash('success_message', 'Item added to the cart.');
    }

    $this->dispatch('refreshComponent');
    return redirect()->route('product.cart');
}


    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();

        // Handle the case where product is not found
        if (!$product) {
            abort(404); // or handle as needed
        }

        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);

        return view('livewire.product-component', [
            'product' => $product,
            'popular_products' => $popular_products,
            'related_products' => $related_products,
            'sale' => $sale
        ])->layout('components.layouts.others');
    }
}
