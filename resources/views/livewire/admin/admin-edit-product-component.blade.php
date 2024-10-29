<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Edit Product</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.products') }}" class="btn btn-success">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label">Product Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="name" placeholder="Product Name" class="form-control" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="slug" class="col-md-4 col-form-label">Product Slug</label>
                                <div class="col-md-8">
                                    <input type="text" id="slug" placeholder="Product Slug" class="form-control" wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="short_description" class="col-md-4 col-form-label">Short Description</label>
                                <div class="col-md-8">
                                    <textarea id="short_description" placeholder="Short Description" class="form-control" wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="description" class="col-md-4 col-form-label">Description</label>
                                <div class="col-md-8">
                                    <textarea id="description" placeholder="Description" class="form-control" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="sale_price" class="col-md-4 col-form-label">Sale Price</label>
                                <div class="col-md-8">
                                    <input type="text" id="sale_price" placeholder="Sale Price" class="form-control" wire:model="sale_price">
                                    @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="regular_price" class="col-md-4 col-form-label">Regular Price</label>
                                <div class="col-md-8">
                                    <input type="text" id="regular_price" placeholder="Regular Price" class="form-control" wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="SKU" class="col-md-4 col-form-label">SKU</label>
                                <div class="col-md-8">
                                    <input type="text" id="SKU" placeholder="SKU" class="form-control" wire:model="SKU">
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="stock_status" class="col-md-4 col-form-label">Stock</label>
                                <div class="col-md-8">
                                    <select id="stock_status" class="form-control" wire:model="stock_status">
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="featured" class="col-md-4 col-form-label">Featured</label>
                                <div class="col-md-8">
                                    <select id="featured" class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="quantity" class="col-md-4 col-form-label">Quantity</label>
                                <div class="col-md-8">
                                    <input type="text" id="quantity" placeholder="Quantity" class="form-control" wire:model="quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="newimage" class="col-md-4 col-form-label">Product Image</label>
                                <div class="col-md-8">
                                    <input type="file" id="newimage" class="form-control" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="New Image" width="120">
                                    @else
                                        <img src="{{ asset('storage/shop/'. $image ) }}" alt="Current Image" width="120">
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="newimages" class="col-md-4 col-form-label">Product Gallery</label>
                                <div class="col-md-8">
                                    <input type="file" id="newimages" class="form-control" wire:model="newimages" multiple>
                                    @if ($newimages)
                                        @foreach ($newimages as $newimage)
                                            @if ($newimage)
                                                <img src="{{ $newimage->temporaryUrl() }}" alt="New Gallery Image" width="120">
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($images as $image)
                                            @if ($image)
                                                <img src="{{ asset('storage/gallery/'. $image ) }}" alt="Gallery Image" width="120">
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label">Category</label>
                                <div class="col-md-8">
                                    <select id="category_id" class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="scategory_id" class="col-md-4 col-form-label">Subcategory</label>
                                <div class="col-md-8">
                                    <select id="scategory_id" class="form-control" wire:model="scategory_id">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($scategories as $scategory)
                                            <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('scategory_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="attribute" class="col-md-4 col-form-label">Product Attributes</label>
                                <div class="col-md-4">
                                    <select id="attribute" class="form-control" wire:model="attribute">
                                        <option value="">Select Attribute</option>
                                        @foreach ($pattributes as $pattribute)
                                            <option value="{{ $pattribute->id }}">{{ $pattribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                                </div>
                            </div>
    
                            @foreach ($inputs as $key => $value)
                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-form-label">{{ $pattributes->where('id', $attribute_arr[$key])->first()->name }}</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="{{ $pattributes->where('id', $attribute_arr[$key])->first()->name }}" class="form-control" wire:model="attribute_values.{{ $value }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{ $key }})">Remove</button>
                                    </div>
                                </div>
                            @endforeach
    
                            <div class="form-group row mb-3">
                                <div class="col-md-4 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
    $(function(){
        tinymce.init({
            selector:'#short_description',
            setup:function(editor){
                editor.on('change',function(){
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description', sd_data);
                });
            }
        });
    
        tinymce.init({
            selector:'#description',
            setup:function(editor){
                editor.on('change',function(){
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description', d_data);
                });
            }
        });
    });
    </script>
    @endpush
    
    @section('title', 'Admin - Product Edit')
    
</div>
