<div>
    <footer class="footer appear-aimate" data-animation-options="{ 'name': 'fadeIn' }">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        @if (Session::has('message'))
            <span class="alert alert-success">{{ Session::get('message') }}</span>
        @endif
        <div class="footer-newsletter bg-primary">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="icon-box icon-box-side text-white">
                            <div class="icon-box-icon d-inline-flex">
                                <i class="w-icon-envelop3"></i>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To Our Newsletter</h4>
                                <p class="text-white">Get all the latest information on Events, Sales, and Offers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0">
                        <form class="input-wrapper input-wrapper-inline input-wrapper-rounded" wire:submit.prevent="subscriber">
                            @csrf
                            <input type="email" class="form-control mr-2 bg-white" name="email" id="email" placeholder="Your E-mail Address" wire:model="email"/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i class="w-icon-long-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget widget-about">
                            <a href="/" class="logo-footer">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-footer" width="180" height="55" />
                            </a>
                            <div class="widget-body">
                                <p class="widget-about-title">Got Question? Call us 24/7</p>
                                <a href="tel:+234{{ $settings->phone ?? '' }}" class="widget-about-call">{{ $settings->phone ?? '' }}</a>
                                <p class="widget-about-desc">Register now to get updates on promotions, rewards & up to 25% product off coupon.</p>

                                <div class="social-icons social-icons-colored">
                                    @foreach (['facebook', 'twitter', 'instagram', 'youtube', 'pinterest'] as $social)
                                        @if (!empty($settings->$social))
                                            <a href="{{ $settings->$social }}" class="social-icon social-{{ $social }} w-icon-{{ $social }}"></a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h3 class="widget-title">Company</h3>
                            <ul class="widget-body">
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="#">Team Member</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4>
                            <ul class="widget-body">
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="{{ route('product.cart') }}">View Cart</a></li>
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('contact') }}">Help</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4>
                            <ul class="widget-body">
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back guarantee!</a></li>
                                <li><a href="#">Product Returns</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle">
                <div class="widget widget-category">
                    @foreach ($categories as $category)
                        <div class="category-box">
                            <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">
                                <h6 class="category-name">{{ $category->name }}:</h6>
                            </a>
                            @if ($category->subCategories->count() > 0)
                                @foreach ($category->subCategories as $subcategory)
                                    <a href="{{ route('product.category', ['category_slug' => $subcategory->slug, 'scategory_slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a>
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-left">
                    <p class="copyright">
                        Copyright © {{ date('Y') == 2022 ? '2022' : '2022-' . date('Y') }} K3marts. All Rights Reserved.
                    </p>
                </div>
                <div class="footer-right">
                    <span class="payment-label mr-lg-8">We're using safe payment for</span>
                    <figure class="payment">
                        <img src="{{ asset('assets/images/payment.png') }}" alt="payment" width="159" height="25" />
                    </figure>
                </div>
            </div>
        </div>
    </footer>

    <!-- Start of Sticky Footer -->
    @livewire('footer-search-component')
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button">
        <i class="w-icon-angle-up"></i>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg>
    </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <div class="mobile-menu-container scrollable">
            @livewire('footer-form-component')
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a href="#main-menu" class="nav-link active">Main Menu</a></li>
                    <li class="nav-item"><a href="#categories" class="nav-link">Categories</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('contact') }}">Help</a></li>
                        @auth
                            @if (Auth::user()->utype == 'ADM' || Auth::user()->utype == 'VEN')
                                <li><a href="{{ route('admin.dashboard') }}">My Account</a></li>
                            @else
                                <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">
                                    <i class="w-icon-store"></i>{{ $category->name }}
                                </a>
                                @if ($category->subCategories->count() > 0)
                                    <ul>
                                        @foreach ($category->subCategories as $subcategory)
                                            <li>
                                                <a href="{{ route('product.category', ['category_slug' => $subcategory->slug, 'scategory_slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->
    <div class="newsletter-popup mfp-hide">
        <div class="newsletter-content">
            <h4 class="text-uppercase font-weight-normal ls-25">Get Up to <span class="text-primary">25% Off</span></h4>
            <h2 class="ls-25">Sign up to K3marts</h2>
            <p class="text-light ls-10">Subscribe to the K3marts market newsletter to receive updates on special offers.</p>
        
            <div class="form-checkbox d-flex align-items-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup" required>
                <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup again.</label>
            </div>
        </div>
    </div>
    <!-- End of Newsletter popup -->
</div>
