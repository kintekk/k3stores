<div class="sticky-footer sticky-content fix-bottom">
    <a href="/" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('shop') }}" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>

    @if (Route::has('login'))
        @auth
            @if (Auth::user()->utype == 'ADM')
                <a href="{{ route('admin.dashboard') }}" class="sticky-link">
                    <i class="w-icon-account"></i>
                    <p>Account</p>
                </a>
            @elseif (Auth::user()->utype == 'VEN')
                <a href="{{ route('vendor.dashboard') }}" class="sticky-link">
                    <i class="w-icon-account"></i>
                    <p>Account</p>
                </a>
            @else
                <a href="{{ route('user.dashboard') }}" class="sticky-link">
                    <i class="w-icon-account"></i>
                    <p>Account</p>
                </a>
            @endif
        @else
            <a href="{{ route('login') }}" class="sticky-link">
                <i class="w-icon-login"></i>
                <p>Login</p>
            </a>
        @endauth
    @endif

    <div class="cart-dropdown dir-up">
        <div class="cart-overlay"></div>
        <a href="#" class="cart-toggle label-down link">
            @if (Cart::instance('cart')->count() > 0)
                <i class="w-icon-cart">
                    <span class="cart-count">{{ Cart::instance('cart')->count() }}</span>
                </i>
            @else
                <i class="w-icon-cart">
                    <span class="cart-count">0</span>
                </i>
            @endif
            <span class="cart-label">Cart</span>
        </a>
        <div class="dropdown-box">
            <div class="products">
                @if (Cart::instance('cart')->count() > 0)
                    @foreach (Cart::instance('cart')->content() as $item)
                        @php
                            $product = $item->model;
                        @endphp
                        @if ($product)
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}" class="product-name">
                                        {{ $product->name }}<br>
                                    </a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{ $item->qty }}</span>
                                        <span class="product-price">NGN {{ number_format($product->regular_price, 2) }}</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage/shop/' . $product->image) }}" alt="{{ $product->name }}" height="84" width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @else
                            <div class="alert alert-warning">This product is no longer available.</div>
                        @endif
                    @endforeach

                    {{-- <div class="cart-total">
                        <label>Subtotal:</label>
                        <span class="price">NGN {{ number_format(Cart::instance('cart')->subtotal(), 2) }}</span>
                    </div> --}}

                    <div class="cart-action">
                        <a href="{{ route('product.cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
                    </div>
                @else
                    <div class="alert alert-info">
                        <a href="{{ route('shop') }}">Empty cart: Click me to shop!</a>
                    </div>
                @endif
            </div>
        </div>
        <!-- End of Dropdown Box -->
    </div>

    <div>
        @livewire('footer-form-component')
    </div>
</div>
