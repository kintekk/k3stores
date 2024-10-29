<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class FooterFormComponent extends Component
{
    public $search = '';
    public $product_cat = 'All Category';
    public $product_cat_id;

    public function mount()
    {
        // You may not need to use this if you're not relying on query parameters
        // $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function searches()
    {
        // Log search parameters for debugging
        \Log::info('Search initiated:', [
            'search' => $this->search,
            'product_cat' => $this->product_cat,
            'product_cat_id' => $this->product_cat_id
        ]);

        // Redirect to the search page
        return redirect()->route('product.search', [
            'search' => $this->search,
            'product_cat' => $this->product_cat,
            'product_cat_id' => $this->product_cat_id
        ]);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.footer-form-component', [
            'categories' => $categories
        ]);
    }
}
