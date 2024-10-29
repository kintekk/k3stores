<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="tab-pane" id="account-orders">
        <div class="contaner" style="padding: 30px 0">
            <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2>
                                            All Orders
                                        </h2> 
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if (Session::has('order_message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                            @endif
                            <div style="overflow-x:auto; ">
                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">OrderId</th>
                                            <th class="order-date">subtotal</th>
                                            <th class="order-date">Discount</th>
                                            <th class="order-date">Tax</th>
                                            <th class="order-date">Shipping</th>
                                            <th class="order-date">First Name</th>
                                            <th class="order-date">Last Name</th>
                                            <th class="order-date">Mobile</th>
                                            <th class="order-date">Email</th>
                                            <th class="order-date">Zipcode</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-total">Order Date</th>
                                            <th>Order Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order )
                                        <tr>
                                            <td class="order-id">{{ $order->id }}</td>
                                            <td class="order-id">NGN {{ $order->subtotal }}</td>
                                            <td class="order-id">NGN {{ $order->discount }}</td>
                                            <td class="order-id">NGN {{ $order->tax }}</td>
                                            <td class="order-id">NGN {{ number_format($order->orderItems->count() * 1500 )}}.00</td>
                                            <td class="order-id">{{ $order->firstname }}</td>
                                            <td class="order-id">{{ $order->lastname }}</td>
                                            <td class="order-id">{{ $order->mobile }}</td>
                                            <td class="order-id">{{ $order->email }}</td>
                                            <td class="order-id">{{ $order->zipcode }}</td>
                                            <td class="order-status">{{ $order->status }}</td>
                                            <td class="order-id">NGN {{  number_format($order->total +( 1500 * $order->orderItems->count())) }}</td>
                                            <td class="order-date">{{ $order->created_at }}</td>
                                            <td class="order-action">
                                                <a href="{{ route('user.orderdetails',['order_id'=>$order->id]) }}"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    {{$orders->links()}}
             </div>
        </div>
    </div>
    @section('title', 'All My Orders')
</div>
