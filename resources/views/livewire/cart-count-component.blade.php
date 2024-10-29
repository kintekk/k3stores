<div>
    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
        <div class="cart-overlay"></div>
        <a href="{{ route('product.cart') }}" class="cart-toggle label-down link">
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
            <div class="cart-header">
                <span>Shopping Cart</span>
                <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
            </div>
            @if (Cart::instance('cart')->count() > 4)
            <div class="cart-action">
                <a href="{{ route('product.cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="#" class="btn btn-primary  btn-rounded" wire:click.prevent="checkout">Checkout</a>
            </div>
            @endif
            @if (Cart::instance('cart')->count() > 0)
            @foreach (Cart::instance('cart')->content() as $item )
            <div class="products">
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}" class="product-name">
                            {{ $item->model->name }}<br>
                        </a>
                        @if (empty($item->model->sale_price))
                        <div class="price-box">
                            <span class="product-quantity">{{ $item->qty }}</span>
                            <span class="product-price">NGN {{ $item->model->regular_price }}</span>
                        </div>
                        @else
                        <div class="price-box">
                            <span class="product-quantity">{{ $item->qty }}</span>
                            <span class="product-price">NGN {{ $item->model->sale_price }}</span>
                        </div>  
                        @endif
                        
                    </div>
                    <figure class="product-media">
                        <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">
                            <img src="{{ asset('storage/shop/' . $item->model->image) }}" alt="{{ $item->model->name }}"height="84"
                                width="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @endforeach
    
            <div class="cart-total">
                <label>Subtotal:</label>
                <span class="price">N{{ Cart::instance('cart')->subtotal }}</span>
            </div>
    
            <div class="cart-action">
                <a href="{{ route('product.cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="#" class="btn btn-primary  btn-rounded" wire:click.prevent="checkout">Checkout</a>
            </div>
            @else
              <div class="alert alert-info"><a href="{{ route('shop') }}">Empty cart: Click me to shop!</a></div>
       @endif
        </div>
        <!-- End of Dropdown Box -->
    </div>
    
</div>
