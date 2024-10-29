<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Setting;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search = '';
    public $product_cat_id = '';

    public function mount()
    {
        $this->fill(request()->only('search',  'product_cat_id'));
    }
    public function searches()
    {
        // Log search parameters for debugging
        \Log::info('Search initiated:', [
            'search' => $this->search,
            'product_cat_id' => $this->product_cat_id
        ]);

        // Redirect to the search page with parameters
        return redirect()->route('product.search', [
            'search' => $this->search,
            'product_cat_id' => $this->product_cat_id
        ]);
    }

    public function render()
    {
        $setting = Setting::find(1);
        $categories = Category::all();
        return view('livewire.header-search-component',['categories' => $categories, 'setting' => $setting]);
    }
}
