<div>
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active">Shopping Cart</li>
                    <li><a href="#" wire:click.prevent="checkout">Checkout</a></li>
                    <li><a href="order.html">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
    
        <!-- Start of PageContent -->
        @if (Cart::instance('cart')->count() > 0)
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
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
                                @if (Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                </div>
                                @endif
                                @foreach (Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                                <figure>
                                                    <img src="{{ asset('storage/shop/' . $item->model->image) }}" alt="{{ $item->model->name }}"
                                                    width="300" height="338">
                                                </figure>
                                            </a>
                                            <button type="button" class="btn btn-close" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    @foreach ($item->options as $key => $value)
                                    <div style="vertical-align: middle; width:100%;">
                                        <p><b>{{ $key }}: {{ $value }}</b></p>
                                    </div>
                                    @endforeach
                                    @if ($item->model->sale_price = "")
                                    <td class="product-price"><span class="amount">NGN {{ number_format($item->model->regular_price, 2) }}</span></td>
                                    <td class="product-quantity">
                                    @else
                                    <td class="product-price"><span class="amount">NGN {{ number_format($item->model->sale_price, 2) }}</span></td>
                                    <td class="product-quantity">  
                                    @endif
                              
                                        <div>{{ $item->qty }}</div>
                                        <div class="input-group">
                                            <input class="quantity form-control" type="number" value="{{ $item->qty }}" min="1" max="100000">
                                            <button class="quantity-plus w-icon-plus" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"></button>
                                            <button class="quantity-minus w-icon-minus" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"></button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">NGN {{ number_format($item->subtotal, 2) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                        <div class="cart-action mb-6">
                            <a href="{{ route('shop') }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                            <button type="button" class="btn btn-rounded btn-default btn-clear" wire:click.prevent="destroyAll">Reset Cart</button> 
                        </div>

                        @if (!Session::has('coupon'))
                            @if (Session::has('coupon_message'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('coupon_message') }}
                                </div>
                            @endif
                            <div style="margin-bottom: 10px">
                                <input type="checkbox" value="1" wire:model="haveCouponCode"> I have a Coupon Code
                            </div>
                            @if ($haveCouponCode == 1)
                                <form class="coupon" wire:submit.prevent="applyCouponCode">
                                    <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                                    <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required wire:model="couponCode"/>
                                    <button class="btn btn-dark btn-outline btn-rounded" type="submit">Apply Coupon</button>
                                </form>
                            @endif
                        @endif
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                <hr class="divider">
                                @if (Session::has('coupon'))
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal After Discount:</label>
                                    <span>NGN {{ number_format($subtotalAfterDiscount, 2) }}</span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Discount ({{ Session::get('coupon')['code'] }}) <a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger" title="remove discount"></i> </a></label>
                                    <span> NGN {{ number_format($discount, 2) }} </span>
                                </div>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Tax ({{ config('cart.tax') }}%)</label>
                                    <span> NGN {{ number_format($taxAfterDiscount, 2) }}</span>
                                </div>
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>Total With Discount:</label>
                                    <span class="ls-50">NGN {{ number_format($totalAfterDiscount, 2) }}</span>
                                </div>
                                <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout" wire:click.prevent="checkout">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                @else
                                {{-- <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal</label>
                                    <span>NGN {{ number_format(Cart::instance('cart')->subtotal(false, false), 2) }}</span>
                                </div> --}}
                                <hr class="divider mb-6">
                                <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout" wire:click.prevent="checkout">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center" style="padding: 30px 0">
            <h1>Your Cart is Empty</h1>
            <p>Add Items to it now!</p>
            <a href="{{ route('shop') }}" class="btn btn-success btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Start Shopping Now!</a>
        </div>
        @endif
        <!-- End of PageContent -->
    </main>
    @section('title', 'Your no.1 Online Shopping Mall | Product Cart')
</div>
