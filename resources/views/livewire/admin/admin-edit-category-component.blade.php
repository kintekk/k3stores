<div>
    <style>
        .icon-box-content {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background-color: #007bff;
            color: white;
        }
    
        .form-group {
            margin-bottom: 15px;
        }
    
        .form-file {
            margin-bottom: 10px;
        }
    
        .form-control {
            margin-bottom: 10px;
        }
    
        .form-control input-md {
            margin-bottom: 0;
        }
    </style>
    
    <div class="container" id="account-details" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="icon-box icon-box-side icon-box-light">
                        <div class="icon-box-content">
                            <h3>Edit Category</h3>
                        </div>
                    </div>
    
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
    
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.category') }}" class="btn btn-success">All Categories</a>    
                    </div>
    
                    <form class="form account-details-form" wire:submit.prevent="updatecategory">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" id="name" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Category Slug</label>
                                    <input type="text" id="slug" placeholder="Category Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="parent_category">Parent Category</label>
                                    <select id="parent_category" class="form-control" wire:model="category_id">
                                        <option value="">None</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_image">Category Image</label>
                                    <input type="file" id="category_image" class="form-file" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="Category Image" width="120">
                                    @else
                                        <img src="{{ asset('storage/categories/' . $image) }}" alt="Category Image" width="120">
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_banner">Category Banner</label>
                                    <input type="file" id="category_banner" class="form-file" wire:model="newbanner">
                                    @if ($newbanner)
                                        <img src="{{ $newbanner->temporaryUrl() }}" alt="Category Banner" width="120">
                                    @else
                                        <img src="{{ asset('storage/banners/' . $banner) }}" alt="Category Banner" width="120">
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Category Edit')
    
</div>
