<div>
    <style>
        .regprice {
            font-weight: 300;
            font-size: 13px !important;
            color: #aaaaaa !important;
            text-decoration: line-through;
            padding-left: 10px;
        }
    </style>
       <!-- Start of Main -->
       <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li>Product details</li>
            </ul>
           
        </nav>
        <!-- End of Breadcrumb -->
    
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                        'navigation': {
                                            'nextEl': '.swiper-button-next',
                                            'prevEl': '.swiper-button-prev'
                                        }
                                    }">
                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                            <div class="swiper-slide">
                                                <figure class="product-image">
                                                    <img src="{{ asset('storage/shop/'.$product->image) }}" alt="{{ $product->name }}" data-zoom-image="{{ asset('storage/shop/'.$product->image) }}" width="800" height="900">
                                                </figure>
                                            </div>
                                            @php
                                            $images = explode(",",$product->images);
                                            @endphp
                                            @foreach ( $images as $image )
                                            @if ($image)
                                            <div class="swiper-slide">
                                                <figure class="product-image">
                                                    <img src="{{ asset('storage/gallery/'.$image) }}"
                                                        data-zoom-image="{{ asset('storage/gallery/'.$image) }}"
                                                        alt="{{ $product->name }}" width="488" height="549">
                                                </figure>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                        <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                    </div>
                                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                        'navigation': {
                                            'nextEl': '.swiper-button-next',
                                            'prevEl': '.swiper-button-prev'
                                        }
                                    }">
                                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage/shop/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            @foreach ( $images as $image )
                                            @if ($image)
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage/gallery/'.$image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{ $product->name }}</h1>
                                    <div class="product-bm-wrapper">
                                        <figure class="brand">
                                            <img src="{{asset('storage/categories/'.$product->category->image)}}" alt="Brand"
                                                width="102" height="48" />
                                        </figure>
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
                                                <span class="product-category"><a href="{{ route('product.category',['category_slug'=>$product->category->slug]) }}">{{ $product->category->name }}</a></span>
                                            </div>
                                            <div class="product-sku">
                                                SKU: <span>{{ $product->slug }}</span>
                                            </div>
                                        </div>
                                    </div>
    
                                    <hr class="product-divider">

                                    @if ($product->stock_status == "outofstock")
                                    <span class="btn btn-info">Out Of Stock</span>
                                @else
                                    <div class="product-price">
                                        @if (!empty($product->sale_price) && isset($sale) && $sale->status == 1 && $sale->sale_date > \Carbon\Carbon::now())
                                            <!-- If there's a valid sale, show sale price and regular price -->
                                            <ins class="new-price">NGN {{ number_format($product->sale_price) }}</ins>
                                            <del>
                                                <span class="product-price regprice">NGN {{ number_format($product->regular_price) }}</span>
                                            </del>
                                        @else
                                            <!-- If there's no sale price or sale conditions are not met, show the regular price -->
                                            <ins class="new-price">NGN {{ number_format(empty($product->sale_price) ? $product->regular_price : $product->sale_price) }}</ins>
                                        @endif
                                    </div>
                                @endif
                                
                                    
                                    <div class="ratings-container">
                                        @php
                                        $avgrating = 0;
                                    @endphp
                                          <div class="ratings-full">
                                            @foreach ($product->orderItems->where('rstatus',1) as $orderItem )
                                            @php
                                                $avgrating =$avgrating + $orderItem->review->rating;
                                            @endphp
                                            <span class="ratings" style="width: {{ $orderItem->review->rating * 20 }}%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                           @endforeach
                                           </div>
                                        <style>
                                            .color-gray{
                                                color: #e6e6e6 !important;
                                            }
                                        </style>
                                    <a href="#product-tab-reviews" class="rating-reviews scroll-to">({{ $product->orderItems->where('rstatus', 1)->count() }}
                                        Review(s))</a>
                                    </div>
    
                                    <div class="product-short-desc">
                                        <p>{!! $product->short_desc !!}</p>
                                    </div>
    
                                    <hr class="product-divider">
                                    {{-- attribute variation --}}
                                    @foreach ( $product->attributeValues->unique('product_attribute_id') as $av )
                                    <div class="row" style="margin-top: 20px">
                                         <div class="col-xs-2">
                                             <p>{{ $av->productAttribute->name }}</p>
                                         </div>
                                         <div class="col-xs-10" wire:ignore>
                                             <select class="form-control" style="width: 200px" wire:model="selected.{{$av->productAttribute->name}}">
                                                 @foreach ($av->productAttribute->attributeValues->where('product_id' ,$product->id) as $pav)
                                                     <option value="{{ $pav->value }}">{{ $pav->value }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 @endforeach
                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" value="1" min="1"
                                                        max="120" wire:model="qty">
                                                    <button class="quantity-plus w-icon-plus" wire:click.prevent="increaseQuantity"></button>
                                                    <button class="quantity-minus w-icon-minus"wire:click.prevent="decreaseQuantity"></button>
                                                </div>
                                            </div>
                                            @if ($product->stock_status == "outofstock")
                                            <span class="btn btn-info"> Out Of Stock</span> 
                                            @else
                                            @if ($product->sale_price == '')
                                            <button class="btn btn-primary btn-cart"  wire:click.prevent = "store({{  $product->id}},'{{ $product->name }}',{{ $product->regular_price }})">
                                                @else
                                                <button class="btn btn-primary btn-cart"  wire:click.prevent = "store({{  $product->id}},'{{ $product->name }}',{{ $product->sale_price }})"> 
                                            @endif
                                            @endif
                                            
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
    
                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                               <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                               <div class="addthis_inline_share_toolbox"></div>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">Customer Reviews ({{ $product->orderItems->where('rstatus',1)->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-5">
                                            <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                            <p class="mb-4">{!! $product->desc !!}</p>
                                            
                                        </div>
                                    </div>
                                    <div class="row cols-md-3">
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                                Shipping &amp; Return</h5>
                                            <p class="detail pl-5">We offer free shipping for products on orders
                                                above  NGN{{ number_format(500000 ) }} and offer free delivery for all orders nationwide.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                                Returns</h5>
                                            <p class="detail pl-5">We guarantee our products and you could get back
                                                all of your money anytime you want in 7 days.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                            </h5>
                                            <p class="detail pl-5">Get 20%-50% off items over NGN{{ number_format(250000 ) }} for a month or
                                                over 250$ for a year with our special credit card.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-lg-5 mb-4">
                                            <div class="ratings-wrapper">
                                                @foreach ($product->orderItems->where('rstatus',1) as $orderItem)
                                                <div class="avg-rating-container">
                                                    <h4 class="avg-mark font-weight-bolder ls-50">{{ ($orderItem->review->rating/$product->orderItems->where('rstatus',1)->count() ) }}</h4>
                                                    <div class="avg-rating">
                                                        <p class="text-dark mb-1">Average Rating</p>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: {{ ($orderItem->review->rating/$product->orderItems->where('rstatus',1)->count() ) *20 }}%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">({{ $product->orderItems->where('rstatus',1)->count() }} Reviews)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="ratings-value d-flex align-items-center text-dark ls-25">
                                                    <span
                                                        class="text-dark font-weight-bold"> {{ ($orderItem->review->rating/$product->orderItems->where('rstatus',1)->count() ) *20 }}%</span>Recommended<span
                                                        class="count">(2 of 3)</span>
                                                </div>
                                                @endforeach
                                                <div class="ratings-list">
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>100%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>80%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>60%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 40%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>40%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 20%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>20%</mark>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 mb-4">
                                            <div class="review-form-wrapper">
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">{{ $product->orderItems->where('rstatus',1)->count() }} Review for</h3>
                                                <span>{{ $product->name }}</span>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="show-all">
                                                <ul class="comments list-style-none">
                                                    @foreach ($product->orderItems->where('rstatus',1) as $orderItem)
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                @if ($orderItem->order->user->profile->image)
                                                                <img src="{{ asset('storage/profiles/'.$orderItem->order->user->profile->image) }}"
                                                                    alt="{{ $orderItem->order->user->name }}" width="90" height="90">
                                                                    @else
                                                                       <img src="{{ asset('assets/images/profile/profile.jpg') }}" width="80%" alt="User">
                                                                    @endif
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">{{ $orderItem->order->user->name }}</a>
                                                                    <span class="comment-date">{{ Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A') }}</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings"
                                                                            style="width:{{ $orderItem->review->rating * 20 }}%;"></span>
                                                                        <span
                                                                            class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>{{$orderItem->review->comment}}.</p>
                                                                <div class="comment-action">
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('storage/shop/'.$orderItem->product->image) }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of {{ $orderItem->order->user->name }} review on {{ $orderItem->product->name }}"
                                                                                    data-zoom-image="{{ asset('storage/shop/'.$orderItem->product->image) }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="vendor-product-section" >
                            <div class="title-link-wrapper mb-4"   >
                                <h4 class="title text-left">Popular Products</h4>
                                <a href="{{ route('shop') }}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '576': {
                                        'slidesPerView': 3
                                    },
                                    '768': {
                                        'slidesPerView': 4
                                    },
                                    '992': {
                                        'slidesPerView': 3
                                    }
                                }
                            }"  >
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2"  >
                                    @foreach ($popular_products as $popular)  
                                    <div class="swiper-slide product"   >
                                        <figure class="product-media">
                                            <a href="{{ route('product.details',['slug'=>$popular->slug]) }}" title="{{ $popular->name }}">
                                                <img src="{{ asset('storage/shop/'.$popular->image) }}" alt="{{ $popular->name }}"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                        <div class="product-details"  >
                                            <div class="product-cat"><a href="{{ route('product.category',['category_slug'=>$popular->category->slug])}}">{{ $popular->category->name }}</a>
                                            </div>
                                            <h4 class="product-name"  ><a href="{{ route('product.details',['slug'=>$popular->slug])  }}">{{ $popular->name }}</a>
                                            </h4>
                                            @php
                                            $avgrating = 0;
                                                @endphp
                                            <div class="ratings-container">
                                             
                                                <div class="ratings-full">
                                                @foreach ($popular->orderItems->where('rstatus',1) as $orderItem )
                                                @php
                                                $avgrating =$avgrating + $orderItem->review->rating;
                                                @endphp
                                                    <span class="ratings" style="width: {{ $orderItem->review->rating * 20 }}%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                @endforeach
                                                </div>
                                                <a href="{{ route('user.review',['order_item_id'=> $popular->id]) }}" class="rating-reviews">(({{ $popular->orderItems->where('rstatus', 1)->count() }}) reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                @if ($popular->sale_price == "")
                                                <div class="product-price">NGN {{number_format( $popular->regular_price) }}</div>
                                                @else
                                                <div class="product-price">NGN {{number_format( $popular->sale_price)}}</div>
                                                @endif
                                            </div>
                                            <div class="product-action"  >
                                                @if ($popular->stock_status == "outofstock")
                                                <span class="btn btn-info"> Out Of Stock</span> 
                                                @else
                                                @if ($popular->sale_price == '')
                                                     <button class="btn btn-primary btn-crt" title="add to cart" wire:click.prevent = "store({{  $popular->id}},'{{ $popular->name }}',{{ $popular->regular_price }})"> <span>Add to Cart</span></button>
                                                @else
                                                <button class="btn btn-primary btn-crt" title="add to cart" wire:click.prevent = "store({{  $popular->id}},'{{ $popular->name }}',{{ $popular->sale_price }})"> <span>Add to Cart</span></button>
                                                @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Related Products</h4>
                                <a href="{{ route('shop') }}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '576': {
                                        'slidesPerView': 3
                                    },
                                    '768': {
                                        'slidesPerView': 4
                                    },
                                    '992': {
                                        'slidesPerView': 3
                                    }
                                }
                            }">
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2"  >
                                    
                                    @foreach ($related_products as  $related)
                                    <div class="swiper-slide product" >
                                        <figure class="product-media">
                                            <a href="{{ route('product.details',['slug'=>$related->slug]) }}" title="{{ $related->name }}">
                                                <img src="{{ asset('storage/shop/'.$related->image) }}" alt="{{ $related->name }}"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details',['slug'=>$related->slug]) }}">{{ $related->name }}</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                @foreach ($related->orderItems->where('rstatus',1) as $orderItem )
                                                @php
                                                    $avgrating =$avgrating + $orderItem->review->rating;
                                                @endphp
                                                    <span class="ratings" style="width: {{ $orderItem->review->rating * 20 }}%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                @endforeach
                                                </div>
                                                <a href="{{ route('user.review',['order_item_id'=> $related->id]) }}" class="rating-reviews">(({{ $related->orderItems->where('rstatus', 1)->count() }}) reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                @if ($related->sale_price == "")
                                                <div class="product-price">NGN {{ number_format( $related->regular_price) }}</div>
                                                @else
                                                <div class="product-price">NGN {{number_format( $related->sale_price)}}</div>
                                                @endif
                                            </div>
                                            <div class="product-action">
                                                @if ($related->stock_status == "outofstock")
                                                <span class="btn btn-info"> Out Of Stock</span> 
                                                @else
                                                @if ($related->sale_price == '')
                                                <button class="btn btn-primary btn-crt" title="add to cart" wire:click.prevent = "store({{  $related->id}},'{{ $related->name }}',{{ $related->regular_price }})"> <span>Add to Cart</span></button>
                                                @else
                                                <button class="btn btn-primary btn-crt" title="add to cart" wire:click.prevent = "store({{  $related->id}},'{{ $related->name }}',{{ $related->sale_price }})"> <span>Add to Cart</span></button>
                                                @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-truck"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over NGN {{ number_format( 500000) }}</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-bag"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-money"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->
    
                                <div class="widget widget-banner mb-9">
                                    <div class="banner banner-fixed br-sm">
                                        <figure>
                                            <img src="{{ asset('assets/images/shop/banner3.jpg') }}" alt="Banner" width="266"
                                                height="220" style="background-color: #1D2D44;" />
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                40<sup class="font-weight-bold">%</sup><sub
                                                    class="font-weight-bold text-uppercase ls-25">Off</sub>
                                            </div>
                                            <h4
                                                class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                Ultimate Sale</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Banner -->
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    @section('title')
    {{ $product->name }} | details and specification.
    @endsection
    </div>
    <!-- End of Main -->
    