<div>
    <div class="container" style="padding: 30px;">
        <!-- Order Details Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 style="color: rgb(4, 4, 71)">Order Details</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.orders') }}" class="btn btn-success pull-right">All Orders</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel-body">
                        <div style="overflow-x:auto;">
                            <table class="table">
                                <tr>
                                    <th>Order Id</th>
                                    <td>{{ $order->id }}</td>
                                    <th>Order Date</th>
                                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <th>Order Status</th>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    @if ($order->status == "delivered")
                                        <th>Delivered Date</th>
                                        <td>{{ $order->delivered_date }}</td>
                                    @elseif ($order->status == "canceled")
                                        <th>Canceled Date</th>
                                        <td>{{ $order->canceled_date }}</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    
        <!-- Ordered Items Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 style="color: rgb(4, 4, 71)">Ordered Items</h2>
                    </div>
                    <div class="panel-body">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>Product</span></th>
                                    <th></th>
                                    <th class="product-price"><span>Price</span></th>
                                    <th class="product-quantity"><span>Quantity</span></th>
                                    <th class="product-subtotal"><span>Subtotal</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.details', ['slug' => $item->product->slug]) }}">
                                                <figure>
                                                    <img src="{{ asset('storage/shop/'.$item->product->image) }}" alt="{{ $item->product->name }}" width="300" height="338">
                                                </figure>
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('product.details', ['slug' => $item->product->slug]) }}">
                                                {{ $item->product->name }}
                                            </a>
                                            @if ($item->options)
                                                <div class="product-options">
                                                    @foreach (unserialize($item->options) as $key => $value)
                                                        <p><b>{{ $key }}: {{ $value }}</b></p>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td class="product-price">NGN {{ number_format($item->price, 2) }}</td>
                                        <td class="product-quantity">{{ $item->quantity }}</td>
                                        <td class="product-subtotal">NGN {{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal:</label>
                                    <span>NGN {{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Tax:</label>
                                    <span>NGN {{ number_format($order->tax, 2) }}</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Shipping:</label>
                                    <span>NGN {{ number_format(1500 * $order->orderItems->count(), 2) }}</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Total:</label>
                                    <span>NGN {{ number_format($order->total + (1500 * $order->orderItems->count()), 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Billing Details Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 style="color: rgb(4, 4, 71)">Billing Details</h2>
                    </div>
                    <div class="panel-body">
                        <table class="shop-table cart-table">
                            <tr>
                                <th class="product-name"><span>First Name</span></th>
                                <td class="product-price">{{ $order->firstname }}</td>
                                <th class="product-price"><span>Last Name</span></th>
                                <td class="product-price">{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th class="product-name"><span>Phone</span></th>
                                <td class="product-price">{{ $order->mobile }}</td>
                                <th class="product-price"><span>Email</span></th>
                                <td class="product-price">{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th class="product-name"><span>Line1</span></th>
                                <td class="product-price">{{ $order->line1 }}</td>
                                <th class="product-price"><span>Line2</span></th>
                                <td class="product-price">{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th class="product-name"><span>City</span></th>
                                <td class="product-price">{{ $order->city }}</td>
                                <th class="product-price"><span>State</span></th>
                                <td class="product-price">{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th class="product-name"><span>Country</span></th>
                                <td class="product-price">{{ $order->country }}</td>
                                <th class="product-price"><span>Zipcode</span></th>
                                <td class="product-price">{{ $order->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Shipping Details Section (if applicable) -->
        @if ($order->is_shipping_different)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 style="color: rgb(4, 4, 71)">Shipping Details</h2>
                        </div>
                        <div class="panel-body">
                            <table class="shop-table cart-table">
                                <tr>
                                    <th class="product-name"><span>First Name</span></th>
                                    <td class="product-price">{{ $order->shipping->firstname }}</td>
                                    <th class="product-price"><span>Last Name</span></th>
                                    <td class="product-price">{{ $order->shipping->lastname }}</td>
                                </tr>
                                <tr>
                                    <th class="product-name"><span>Phone</span></th>
                                    <td class="product-price">{{ $order->shipping->mobile }}</td>
                                    <th class="product-price"><span>Email</span></th>
                                    <td class="product-price">{{ $order->shipping->email }}</td>
                                </tr>
                                <tr>
                                    <th class="product-name"><span>Line1</span></th>
                                    <td class="product-price">{{ $order->shipping->line1 }}</td>
                                    <th class="product-price"><span>Line2</span></th>
                                    <td class="product-price">{{ $order->shipping->line2 }}</td>
                                </tr>
                                <tr>
                                    <th class="product-name"><span>City</span></th>
                                    <td class="product-price">{{ $order->shipping->city }}</td>
                                    <th class="product-price"><span>State</span></th>
                                    <td class="product-price">{{ $order->shipping->province }}</td>
                                </tr>
                                <tr>
                                    <th class="product-name"><span>Country</span></th>
                                    <td class="product-price">{{ $order->shipping->country }}</td>
                                    <th class="product-price"><span>Zipcode</span></th>
                                    <td class="product-price">{{ $order->shipping->zipcode }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
        <!-- Transaction Details Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 style="color: rgb(4, 4, 71)">Transaction</h2>
                    </div>
                    <div class="panel-body">
                        <table class="shop-table cart-table">
                            @if ($order->transaction->mode == '')
                                <div class="alert alert-danger">This Transaction wasn't completed.</div>
                            @else
                                <tr>
                                    <th class="product-name"><span>Transaction Mode</span></th>
                                    <td class="product-price">{{ $order->transaction->mode }}</td>
                                </tr>
                                <tr>
                                    <th class="product-price"><span>Status</span></th>
                                    <td class="product-price dropdown">
                                        <span class="amount">{{ $order->transaction->status }}</span>
                                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                            Status <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->transaction->id }}, 'approved')">Approve</a></li>
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->transaction->id }}, 'declined')">Decline</a></li>
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->transaction->id }}, 'refunded')">Refund</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="product-name"><span>Transaction Date</span></th>
                                    <td class="product-price">{{ $order->transaction->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('title', 'Admin - Order Details')
    
</div>
