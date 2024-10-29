<div>
    <div class="container" id="account-details" style="padding:30px 0;">
        <div class="row">
            <div class="col-mb-12">
                <div class="panel panel-default">
                    <div class="icon-box icon-box-side icon-box-light">
                        <div class="icon-box-content col-md-6 btn btn-primary">
                            <h3 style="color: white">Add New Category</h3>
                        </div>
                    </div>
    
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
    
                    <div class="col-md-6">
                        <a href="{{ route('admin.category') }}" class="btn btn-success">All Categories</a>
                    </div>
                    
                    <hr> <br>
    
                    <form class="form account-details-form" wire:submit.prevent="storeCategory">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Category Slug</label>
                                    <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Parent Category</label>
                                    <select name="category_id" class="form-control input-md" wire:model="category_id">
                                        <option value="">None</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="image">Category Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="" width="120">
                                    @endif
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="banner">Category Banner</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-file" wire:model="banner">
                                    @if ($banner)
                                        <img src="{{ $banner->temporaryUrl() }}" alt="" width="120">
                                    @endif
                                    @error('banner')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin-Category-Add!')
    
</div>
