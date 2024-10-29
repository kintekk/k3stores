<div>
    <div class="container" style="padding: 30px">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 style="color: rgb(4, 4, 71)">Order Details</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.order') }}" class="btn btn-success pull-right"> My Orders</a>
                                @if ($order->status == 'ordered')
                                <a href="#" wire:click.prevent= "cancelOrder" class="btn btn-warning pull-right" style="margin-right: 20"> Cancel Order</a>
                            @endif
                            </div>
                           
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr></tr>
                            <th>Order Id</th>
                            <td>{{ $order->id }}</td>
                            <th>Order Date</th>
                            <td>{{ $order->created_at }}</td>
                            <th>Order Status</th>
                            <td>{{ $order->status }}</td>
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
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 style="color: rgb(4, 4, 71)">Ordered Items</h2>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
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
                                   
                                    @foreach ($order->orderItems as $item )
                                    <tr>
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="{{ route('product.details',['slug'=>$item->product->slug]) }}">
                                                    <figure>
                                                        <img src="{{ asset('storage/shop/'. $item->product->image ) }}" alt="{{ $item->product->name }}"
                                                        width="300" height="338">
                                                    </figure>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('product.details', ['slug'=>$item->product->slug]) }}">
                                                {{ $item->product->name }}
                                            </a>
                                        </td>
                                        {{-- attribute options  --}}
                                        @if ($item->options)
                                        <div class="product-name">
                                            @foreach (unserialize($item->options) as $key->$value )
                                                 <p><b>{{$key}}:{{$value}}</b></p>
                                            @endforeach
                                        </div>
                                        @endif
                                        <td class="product-price"><span class="amount">NGN {{ number_format($item->price) }}</span></td>
                                        <td class="product-quantity">
                                            <div>{{ $item->quantity }}</div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">NGN {{  number_format( $item->price * $item->quantity)}}</span>
                                        </td>
                                        @if ($order->status == 'delivered' && $item->rstatus == false)
                                        <td>
                                            <span><a href="{{ route('user.review',['order_item_id'=>$item->id]) }}">Write a Review**</a></span> 
                                         </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box"> Order Summary</h4>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal:</label>
                                    <span>NGN {{ number_format($order->subtotal)  }}</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Tax:</label>
                                    <span>NGN {{ number_format($order->tax) }}</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Shipping:</label>
                                    <span>NGN {{  number_format(1500 * $order->orderItems->count()) }}.00</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Total:</label>
                                    <span>NGN {{ number_format( $order->total +( 1500 * $order->orderItems->count()))  }}.00</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <h2 style="color: rgb(4, 4, 71)"> Billing Details </h2> 
                    </div>
                        <div class="panel-body">
                            <table class="shop-table cart-table">
                                  
                                      <tr>
                                        <th class="product-name"><span>First Name</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->firstname }}</span></td>
                                        <th class="product-price"><span>Last Name</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->lastname }}</span></td>
                                    </tr>
                                    <tr>
                                        <th class="product-name"><span>Phone</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->mobile }}</span></td>
                                        <th class="product-price"><span>Mail</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->email }}</span></td>
                                    </tr>
                                    <tr>
                                        <th class="product-name"><span>Line1</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->line1 }}</span></td>
                                        <th class="product-price"><span>line2</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->line2 }}</span></td>
                                    </tr>
                                    <tr>
                                        <th class="product-name"><span>City</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->city }}</span></td>
                                        <th class="product-price"><span>State</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->province }}</span></td>
                                    </tr>
                                    <tr>
                                        <th class="product-name"><span>Country</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->country }}</span></td>
                                        <th class="product-price"><span>Zipcode</span></th>
                                        <td class="product-price"><span class="amount">{{ $order->zipcode }}</span></td>
                                    </tr>
                               
                            </table>
                        </div>
                </div>
            </div>
        </div>
        @if ($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 style="color: rgb(4, 4, 71)"> Shipping Details</h2>
                    </div>
                        <div class="panel-body">
                            <table class="shop-table cart-table">
                                  
                                <tr>
                                  <th class="product-name"><span>First Name</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->firstname }}</span></td>
                                  <th class="product-price"><span>Last Name</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->lastname }}</span></td>
                              </tr>
                              <tr>
                                  <th class="product-name"><span>Phone</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->mobile }}</span></td>
                                  <th class="product-price"><span>Mail</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->email }}</span></td>
                              </tr>
                              <tr>
                                  <th class="product-name"><span>Line1</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->line1 }}</span></td>
                                  <th class="product-price"><span>line2</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->line2 }}</span></td>
                              </tr>
                              <tr>
                                  <th class="product-name"><span>City</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->city }}</span></td>
                                  <th class="product-price"><span>State</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->province }}</span></td>
                              </tr>
                              <tr>
                                  <th class="product-name"><span>Country</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->country }}</span></td>
                                  <th class="product-price"><span>Zipcode</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->shipping->zipcode }}</span></td>
                              </tr>
                         
                            </table>
                        </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <h2  style="color: rgb(4, 4, 71)"> Transaction</h2>
                    </div>
                        <div class="panel-body">
                            <table class="shop-table cart-table">
                                 @if ($order->transaction->mode == '')
                                 <div class="alert alert-danger">Your Transaction couldn't be completed contact the management </div>
                                 @else
                                 <tr>
                                    <th class="product-name"><span>Transaction Mode</span></th>
                                    <td class="product-price"><span class="amount">{{ $order->transaction->mode }}</span></td>
                                </tr>
                                <tr>
                                    <th class="product-price"><span>Status</span></th>
                                    @if ($order->transaction->status == 'approved')
                                    <td class="product-price"><span class="amount btn text-success">{{ $order->transaction->status }}</span></td>
                                    @elseif ($order->transaction->status == 'declined')
                                    <td class="product-price"><span class="amount  btn  text-danger">{{ $order->transaction->status }}</span></td>
                                    @elseif ($order->transaction->status == 'refunded')
                                    <td class="product-price"><span class="amount  btn text-primary">{{ $order->transaction->status }}</span></td>
                                    @else
                                    <td class="product-price"><span class="amount btn  text-info">{{ $order->transaction->status }}</span></td>
                                    @endif
                                </tr>
                                <tr>
                                  <th class="product-name"><span>Transaction Date</span></th>
                                  <td class="product-price"><span class="amount">{{ $order->transaction->created_at }}</span></td>
                                </tr>
                                     
                                 @endif 
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @section('title', 'My Orders Details')
</div>
