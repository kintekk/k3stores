<div>
    <style>
        .order-id, .order-date, .order-status, .order-actions {
            padding: 10px;
            text-align: left;
        }
    
        .order-actions a {
            margin-left: 10px;
        }
    
        .order-status {
            text-align: center;
        }
    
        .shop-table {
            width: 100%;
            border-collapse: collapse;
        }
    
        .shop-table th, .shop-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        .shop-table th {
            background-color: #f2f2f2;
        }
    </style>
    
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>All Coupons</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcoupon') }}" class="btn btn-success pull-right">Add Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
    
                        <table class="shop-table">
                            <thead>
                                <tr>
                                    <th class="order-id">Id</th>
                                    <th class="order-date">Coupon Code</th>
                                    <th class="order-status">Coupon Type</th>
                                    <th class="order-status">Coupon Value</th>
                                    <th class="order-status">Cart Value</th>
                                    <th class="order-status">Expiry Date</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td class="order-id">{{ $coupon->id }}</td>
                                        <td class="order-date">{{ $coupon->code }}</td>
                                        <td class="order-status">{{ ucfirst($coupon->type) }}</td>
                                        <td class="order-status">
                                            @if ($coupon->type == 'fixed')
                                                NGN{{ number_format($coupon->value) }}
                                            @else
                                                {{ $coupon->value }} %
                                            @endif
                                        </td>
                                        <td class="order-status">NGN{{ number_format($coupon->cart_value) }}</td>
                                        <td class="order-status">{{ $coupon->expiry_date }}</td>
                                        <td class="order-actions">
                                            <a href="{{ route('admin.editcoupon', ['coupon_id' => $coupon->id]) }}">
                                                <i class="fa fa-edit fa-2x" title="Edit"></i>
                                            </a>
                                            <a href="#" onclick="if(confirm('Are you sure you want to delete this coupon?')) { @this.deleteCoupon({{ $coupon->id }}) }" class="text-danger">
                                                <i class="fa fa-times fa-2x" title="Delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                        <!-- Ensure pagination links are displayed properly -->
                        {{ $coupons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Coupons')
    
</div>
