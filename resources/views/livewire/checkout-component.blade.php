<div>
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{ route('product.cart') }}">Shopping Cart</a></li>
                    <li class="active"><a href="#">Checkout</a></li>
                    <li><a href="#">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        
        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <form wire:submit.prevent="billingDetails">
                            @csrf
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Billing Details
                            </h3>
                            <div class="row gutter-sm">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                                @endif
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="firstname">First name *</label>
                                        <input type="text" id="firstname" class="form-control form-control-md" name="firstname" wire:model="firstname">
                                        @error('firstname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="lastname">Last name *</label>
                                        <input type="text" id="lastname" class="form-control form-control-md" name="lastname" wire:model="lastname">
                                        @error('lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="line1">Line1 <i>(Optional)</i></label>
                                        <input type="text" id="line1" class="form-control form-control-md" name="line1" wire:model="line1">
                                        @error('line1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="phone">Phone *</label>
                                        <input type="text" id="phone" class="form-control form-control-md" name="phone" wire:model="mobile">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                <span class="text-success">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">Town / City *</label>
                                        <input type="text" id="city" class="form-control form-control-md" name="town" wire:model="city">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province">State *</label>
                                        <div class="select-box">
                                            <select id="province" class="form-control" wire:model="province">
                                                @foreach ($states as $state)
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                            @error('province')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-success btn-rounded">Update/Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                @if(Session::has('checkout'))
                                    @php
                                        // Initialize subtotal
                                        $subtotal = 0;

                                        // Calculate subtotal
                                        foreach (Cart::instance('cart')->content() as $item) {
                                            $product = $item->model;

                                            if ($product->sale_price && $product->sale_price !== "") {
                                                // If sale_price is set and not empty, use sale_price
                                                $subtotal += $product->sale_price * $item->qty;
                                            } else {
                                                // Otherwise, use regular_price
                                                $subtotal += $product->regular_price * $item->qty;
                                            }
                                        }

                                        // Calculate VAT
                                        $vatRate = config('cart.tax') / 100; // Assuming VAT rate is in percentage
                                        $vat = $subtotal * $vatRate;

                                        // Calculate shipping cost
                                        $shippingCostPerItem = 1500;
                                        $shippingCost = $shippingCostPerItem * Cart::instance('cart')->count();

                                        // Total including VAT and shipping
                                        $total = $subtotal + $vat + $shippingCost;
                                    @endphp

                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2"><b>Product</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::instance('cart')->content() as $item)
                                                @php
                                                    $product = $item->model;
                                                @endphp

                                                @if ($product)
                                                    <tr class="bb-no">
                                                        <td class="product-name">
                                                            {{ $product->name }} <i class="fas fa-times"></i> <span class="product-quantity">{{ $item->qty }}</span>
                                                        </td>
                                                        <td class="product-total">
                                                            NGN {{ number_format($product->sale_price ? $product->sale_price * $item->qty : $product->regular_price * $item->qty) }}
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr class="bb-no">
                                                        <td class="product-name">Product not found</td>
                                                        <td class="product-total">NGN 0.00</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td><b>VAT ({{ config('cart.tax') }}%)</b></td>
                                                <td>NGN {{ number_format($vat) }}</td>
                                            </tr>
                                            <tr class="cart-subtotal bb-no">
                                                <td><b>Subtotal</b></td>
                                                <td><b>NGN {{ number_format($subtotal + $vat) }}</b></td>
                                            </tr>
                                           
                                        </tbody>

                                        <tfoot>
                                            <tr class="shipping-methods">
                                                <td colspan="2" class="text-left">
                                                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping</h4>
                                                    <ul id="shipping-method" class="mb-4">
                                                        <li>
                                                            <div class="custom-radio">
                                                                <label for="flat-rate" class="custom-control-label color-dark">Shipping fee: NGN {{ number_format($shippingCost) }}</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th><b>Total</b></th>
                                                <td><b>NGN {{ number_format($total) }}</b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @endif
                                <div id="processing" style="font-size:22px; margin-bottom:20px; padding-left: 37px; color:green; display:none">
                                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    <span class="text-success">Processing....</span>
                                </div>
                                @if ($hasBillingDetails)
                                    <div class="form-group place-order pt-6">
                                        <form wire:submit.prevent="initialize" onsubmit="$('#processing').show();">
                                            @if ($errors->isEmpty())
                                                <div wire:ignore id="processing" style="font-size:22px; margin-bottom:20px; padding-left: 37px; color:green; display:none">
                                                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                    <span class="text-success">Processing....</span>
                                                </div>      
                                            @endif
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="form-group place-order pt-6">
                                        <div class="alert alert-info">Please fill out the billing details to place your order</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    @section('title', 'Your no.1 Online Shopping Mall | Product Checkout')
</div>
