<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <h1 style="color: blue">K3marts</h1>
    <p>Hi {{ $order->firstname }} {{ $order->lastname }}</p>
    <p>Your Order has been successfully place.</p>
    <br>
    <table style="width:600px; text-align:right">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item )
                <tr>
                    <td><img src="{{ asset('assets/images/shop') }}/{{ $item->product->image }}" alt="" width="100"></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>NGN {{ $item->price * $item->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"style=" border-top:1px solid #ccc;"></td>
                <td style="font-size: 15px; font-weight:bold; border-top:1px solid #ccc;">Subtotal: NGN {{ $order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Tax: NGN {{ $order->tax}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Shipping: Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 22px; font-weight:bold;">Total: NGN {{ $order->total}}</td>
            </tr>
        </tbody>
    </table>
    
    <footer class="footer appear-animate" data-animation-options="{ 'name': 'fadeIn' }">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget widget-about">
                            <a href="/" class="logo-footer">
                                <img src="{{ asset('assets/images/logo.png')}}" alt="logo-footer" width="180"
                                    height="55" />
                            </a> 
                            @php
                            $settings = DB::table('settings')->where('id', 1)->first();
                        @endphp 
                        
                        <div class="widget-body">
                            <p class="widget-about-title">Got a Question? Call us 24/7</p>
                            @if ($settings)
                                <a href="tel:+234{{ $settings->phone }}" class="widget-about-call">{{ $settings->phone }}</a>
                                <div class="social-icons social-icons-colored">
                                    @if ($settings->facebook)
                                        <a href="{{ $settings->facebook }}" class="social-icon social-facebook w-icon-facebook"></a>
                                    @endif
                                    @if ($settings->twitter)
                                        <a href="{{ $settings->twitter }}" class="social-icon social-twitter w-icon-twitter"></a>
                                    @endif
                                    @if ($settings->instagram)
                                        <a href="{{ $settings->instagram }}" class="social-icon social-instagram w-icon-instagram"></a>
                                    @endif
                                    @if ($settings->youtube)
                                        <a href="{{ $settings->youtube }}" class="social-icon social-youtube w-icon-youtube"></a>
                                    @endif
                                    @if ($settings->pinterest)
                                        <a href="{{ $settings->pinterest }}" class="social-icon social-pinterest w-icon-pinterest"></a>
                                    @endif
                                </div>
                            @else
                                <p>Contact us for more information.</p>
                            @endif
                        </div>
                        
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h3 class="widget-title">Account</h3>
                            <ul class="widget-body">
                                <li><a href="{{ route('user.order')}}">View order</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="footer-bottom">
                <div class="footer-left">
                    <p class="copyright">Copyright © 2022 K3marts. All Rights Reserved.</p>
                </div>
                <div class="footer-right">
                    <span class="payment-label mr-lg-8">We're using safe payment for</span>
                    <figure class="payment">
                        <img src="{{ asset('assets/images/payment.png')}}" alt="payment" width="159" height="25" />
                    </figure>
                </div>
            </div>
        </div>
    </footer>
<!-- End of Footer -->
</div>
<!-- End of Page-wrapper-->
</body>
</html>