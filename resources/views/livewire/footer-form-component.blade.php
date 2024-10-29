<div>
    <form wire:submit.prevent="searches" class="input-wrapper">
        <input type="text" class="form-control" name="search" id="search"
               placeholder="Search in..." required wire:model="search" />

        <input type="hidden" name="product_cat" id="Product_cate"
               value="{{ $product_cat }}" wire:model="product_cat" />

        <input type="hidden" name="product_cat_id" id="Product_cate_id"
               value="{{ $product_cat_id }}" wire:model="product_cat_id" />

        <button class="btn btn-search" type="submit">
            <i class="w-icon-search"></i>
        </button>
    </form>
</div>
