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
    
        .form-control {
            margin-bottom: 10px;
        }
    
        .btn-primary {
            margin-top: 15px;
        }
    </style>
    
    <div class="container" id="account-details" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="icon-box icon-box-side icon-box-light">
                        <div class="icon-box-content">
                            <h3>Edit Coupon</h3>
                        </div>
                    </div>
    
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
    
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.coupons') }}" class="btn btn-success">All Coupons</a>
                    </div>
    
                    <hr> 
    
                    <form class="form account-details-form" wire:submit.prevent="updateCoupon">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Coupon Code</label>
                                    <input type="text" id="code" placeholder="Coupon Code" class="form-control input-md" wire:model="code">
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Coupon Type</label>
                                    <select id="type" class="form-control" wire:model="type">
                                        <option value="">Select</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value">Coupon Value</label>
                                    <input type="text" id="value" placeholder="Coupon Value" class="form-control input-md" wire:model="value">
                                    @error('value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cart_value">Cart Value</label>
                                    <input type="text" id="cart_value" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value">
                                    @error('cart_value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" placeholder="Expiry Date" class="form-control input-md" wire:model="expiry_date">
                                    @error('expiry_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        $(function() {
            $('#expiry').datetimepicker({
                format: 'YYYY-MM-DD'
            }).on('dp.change', function(ev) {
                var data = $('#expiry').val();
                @this.set('expiry_date', data);
            });
        });
    </script>
    @endpush
    
    @section('title', 'Admin - Coupon Edit')
    
</div>
