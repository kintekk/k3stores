<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Manage Home Categories</h3>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="categories" class="col-md-4 col-form-label">Choose Categories</label>
                                <div class="col-md-8">
                                    <select name="categories[]" id="categories" multiple class="form-control sel_categories" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="numberofproducts" class="col-md-4 col-form-label">No of Products</label>
                                <div class="col-md-8">
                                    <input type="text" id="numberofproducts" class="form-control" wire:model="numberofproducts">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Categories')
    
    @push('scripts')
    <script>
    $(document).ready(function(){
        // Initialize Select2
        $('.sel_categories').select2();
    
        // Update Livewire property on change
        $('.sel_categories').on('change', function(e) {
            var data = $(this).val();
            @this.set('selected_categories', data);
        });
    });
    </script>
    @endpush
    
</div>
