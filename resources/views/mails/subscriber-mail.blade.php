<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsletter Subscription Confirmation</title>
</head>
<body>
    <p>Hi,</p>
    <p>You are successfully added to our newsletter list.</p>
    <p>Hence, you'll be recievings mails on special offers and discounts</p>
    <img src="asset{{ asset('assets/images/logo.png') }}" alt="">
    <br>
    <footer class="footer appear-animate" data-animation-options="{ 'name': 'fadeIn'  }">
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
</body>
</html>