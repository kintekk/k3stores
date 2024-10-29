<div>
<div class="container" id="account-details" style="padding:30px 0;">
    <div class="row">
        <div class="col-mb-12">
            <div class="panel panel-default">
                <div class="icon-box icon-box-side icon-box-light">
                    <div class="icon-box-content col-md-6 btn btn-primary">
                        <h3 style="color: white">Add New Attribute</h3>
                    </div>
                </div>
                @if (Session::has('message'))

                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                    
                @endif
                <div class="col-md-6">
                    <a href="{{ route('admin.attribute') }}" class="btn btn-success">All Attributes</a>    
                </div> 
                <hr> <br>
                <form class="form account-details-form"  wire:submit.prevent="storeAttribute">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category name">Attribute Name</label>
                                <input type="text" placeholder="Attribute name" class="form-control input-md"wire:model="name">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" type="submit">Save </button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('title', 'Admin-Attribute-Add!')
</div>
