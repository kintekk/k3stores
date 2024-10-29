<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
        .dropdown-box {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .dropdown:hover .dropdown-box {
            display: block;
        }
        .dropdown-box a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 5px 10px;
        }
        .dropdown-box a:hover {
            background-color: #f1f1f1;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>All Orders</h2>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
                        <div style="overflow-x:auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Shipping</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Zipcode</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Order Date</th>
                                        <th>Details</th>
                                        <th class="text-center" colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>NGN {{ number_format($order->subtotal, 2) }}</td>
                                            <td>NGN {{ number_format($order->discount, 2) }}</td>
                                            <td>NGN {{ number_format($order->tax, 2) }}</td>
                                            <td>NGN {{ number_format($order->orderItems->count() * 1500, 2) }}</td>
                                            <td>{{ $order->firstname }}</td>
                                            <td>{{ $order->lastname }}</td>
                                            <td>{{ $order->mobile }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->zipcode }}</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td>NGN {{ number_format($order->total + (1500 * $order->orderItems->count()), 2) }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}" class="btn btn-outline btn-primary btn-sm">View</a>
                                            </td>
                                            <td class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                                    Status <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-box">
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'delivered')">Delivered</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'canceled')">Canceled</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('title', 'Admin - Orders')
</div>
