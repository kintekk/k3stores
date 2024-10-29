<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Edit Slides</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success">All Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form class="form account-details-form" wire:submit.prevent="updateslide">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="title" class="col-md-4 col-form-label">Title</label>
                                <div class="col-md-8">
                                    <input type="text" id="title" placeholder="Title" class="form-control" wire:model="title">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="subtitle" class="col-md-4 col-form-label">SubTitle</label>
                                <div class="col-md-8">
                                    <input type="text" id="subtitle" placeholder="SubTitle" class="form-control" wire:model="subtitle">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="price" class="col-md-4 col-form-label">Price</label>
                                <div class="col-md-8">
                                    <input type="text" id="price" placeholder="Price" class="form-control" wire:model="price">
                                    @error('price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="link" class="col-md-4 col-form-label">Link</label>
                                <div class="col-md-8">
                                    <input type="text" id="link" placeholder="Link" class="form-control" wire:model="link">
                                    @error('link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="newimage" class="col-md-4 col-form-label">Image</label>
                                <div class="col-md-8">
                                    <input type="file" id="newimage" class="form-control" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="New Image" width="120">
                                    @else
                                        <img src="{{ asset('storage/sliders/'. $image ) }}" alt="Current Image" width="120">
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="status" class="col-md-4 col-form-label">Status</label>
                                <div class="col-md-8">
                                    <select id="status" class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary btn-rounded">Update Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Slider Edit')
    
</div>
