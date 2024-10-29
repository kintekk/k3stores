<div>
    <!-- Start of Main-->
    <main class="main">
   
       <section class="intro-section">
                 <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
                     data-swiper-options="{
                     'slidesPerView': 1,
                     'autoplay': {
                         'delay': 8000,
                         'disableOnInteraction': false
                     }
                 }">
                     <div class="swiper-wrapper">
                         <style>
                             .bg-white{
                                 background-color: white;
                             }
                         </style>
                 @foreach ( $slider as $slider )
                         <div class="swiper-slide banner banner-fixed intro-slide intro-slide1 bg-white"
                             style="background-image: url('{{ asset('storage/sliders/'.$slider->image) }}');" >
                             <div class="container">
                                 <figure class="slide-image skrollable slide-animate">
                                     <img src="{{ asset('assets/images/sliders')}}/{{ $slider->image }}" alt="{{ $slider->title }}"
                                         data-bottom-top="transform: translateY(10vh);"
                                         data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                                 </figure>
                                 <div class="banner-content y-50 text-right">
                                     <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                                         data-animation-options="{
                                     'name': 'fadeInRightShorter',
                                     'duration': '1s',
                                     'delay': '.2s'
                                 }">
                                         <span class="p-relative d-inline-block" style="color: rgb(218, 21, 156)">{{ $slider->subtitle }}</span>
                                     </h5>
                                     <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                                         data-animation-options="{
                                     'name': 'fadeInRightShorter',
                                     'duration': '1s',
                                     'delay': '.4s'
                                 }" ><strong>
                                 {{ $slider->title }}
   
                                 </strong>
                                     </h3>
                                     <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                     'name': 'fadeInRightShorter',
                                     'duration': '1s',
                                     'delay': '.6s'
                                 }">
                                         Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                                     </p>
   
                                     <a href="{{ $slider->link }}"
                                         class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                         data-animation-options="{
                                     'name': 'fadeInRightShorter',
                                     'duration': '1s',
                                     'delay': '.8s'
                                 }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>
   
                                 </div>
                                 <!-- End of .banner-content -->
                             </div>
                             <!-- End of .container -->
                         </div>
                         <!-- End of .intro-slide1 -->
                     @endforeach
                     </div>
                     <div class="swiper-pagination"></div>
                     <button class="swiper-button-next"></button>
                     <button class="swiper-button-prev"></button>
                 </div>
                 <!-- End of .swiper-container -->
             </section>
     <!-- End of .intro-section -->
   
     <div class="container">
         <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
             'slidesPerView': 1,
             'loop': false,
             'breakpoints': {
                 '576': {
                     'slidesPerView': 2
                 },
                 '768': {
                     'slidesPerView': 3
                 },
                 '1200': {
                     'slidesPerView': 4
                 }
             }
         }">
             <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                 <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                     <span class="icon-box-icon icon-shipping">
                         <i class="w-icon-truck"></i>
                     </span>
                     <div class="icon-box-content">
                         <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                         <p class="text-default">For all orders over NGN 500000</p>
                     </div>
                 </div>
                 <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                     <span class="icon-box-icon icon-payment">
                         <i class="w-icon-bag"></i>
                     </span>
                     <div class="icon-box-content">
                         <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                         <p class="text-default">We ensure secure payment</p>
                     </div>
                 </div>
                 <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                     <span class="icon-box-icon icon-money">
                         <i class="w-icon-money"></i>
                     </span>
                     <div class="icon-box-content">
                         <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                         <p class="text-default">Any back within 7 days</p>
                     </div>
                 </div>
                 <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                     <span class="icon-box-icon icon-chat">
                         <i class="w-icon-chat"></i>
                     </span>
                     <div class="icon-box-content">
                         <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                         <p class="text-default">Call or email us 24/7</p>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End of Iocn Box Wrapper -->
   
         <div class="row category-banner-wrapper appear-animate pt-6 pb-8">
             <div class="col-md-6 mb-4">
                 <div class="banner banner-fixed br-xs">
                     <figure>
                         <img src="{{ asset('assets/images/demos/demo1/categories/1-1.jpg')}}" alt="Category Banner"
                             width="610" height="160" style="background-color: #ecedec;" />
                     </figure>
                     <div class="banner-content y-50 mt-0">
                         <h5 class="banner-subtitle font-weight-normal text-dark">Get up to <span
                                 class="text-secondary font-weight-bolder text-uppercase ls-25">20% Off</span>
                         </h5>
                         <h3 class="banner-title text-uppercase">Sports Outfits<br><span
                                 class="font-weight-normal                       text-capitalize">Collection</span>
                         </h3>
                         <div class="banner-price-info font-weight-normal">Starting at <span
                                 class="text-secondary                       font-weight-bolder">NGN 3000.00</span>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 mb-4">
                 <div class="banner banner-fixed br-xs">
                     <figure>
                         <img src="{{ asset('assets/images/demos/demo1/categories/1-2.jpg')}}" alt="Category Banner"
                             width="610" height="160" style="background-color: #636363;" />
                     </figure>
                     <div class="banner-content y-50 mt-0">
                         <h5 class="banner-subtitle font-weight-normal text-capitalize">New Arrivals</h5>
                         <h3 class="banner-title text-white text-uppercase">Accessories<br><span
                                 class="font-weight-normal text-capitalize">Collection</span></h3>
                         <div class="banner-price-info text-white font-weight-normal text-capitalize">Only From
                             <span class="text-secondary font-weight-bolder">NGN 2000    .00</span></div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End of Category Banner Wrapper -->
   
         <div class="row deals-wrapper appear-animate mb-8">
             <div class="col-lg-9 mb-4">
                 <div class="single-product h-100 br-sm">
                     <h4 class="title-sm title-underline font-weight-bolder ls-normal">
                         Hot Deals of The Day
                     </h4>
                     <div class="swiper">
                        <div class="swiper-container swiper-theme nav-top swiper-nav-lg" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1
                        }">
                            @if($sproducts->count() > 0 && $sale && $sale->status == 1 && $sale->sale_date > \Carbon\Carbon::now())
                                <div class="swiper-wrapper row cols-1 gutter-no">
                                    @foreach ($sproducts as $sproduct)
                                        <div class="swiper-slide">
                                            <div class="product product-single row">
                                                <div class="col-md-6">
                                                    <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                                @php
                                                                    $images = explode(",", $sproduct->images);
                                                                @endphp
                                                                @foreach ($images as $image)
                                                                    @if ($image)
                                                                        <div class="swiper-slide">
                                                                            <figure class="product-image">
                                                                                <img src="{{ asset('storage/gallery/' . $image) }}"
                                                                                     data-zoom-image="{{ asset('storage/gallery/' . $image) }}"
                                                                                     alt="Product Image" width="800" height="900">
                                                                            </figure>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                @if ($sproduct->image)
                                                                    <div class="swiper-slide">
                                                                        <figure class="product-image">
                                                                            <img src="{{ asset('storage/shop/' . $sproduct->image) }}"
                                                                                 data-zoom-image="{{ asset('storage/shop/' . $sproduct->image) }}"
                                                                                 alt="Product Image" width="800" height="900">
                                                                        </figure>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <button class="swiper-button-next"></button>
                                                            <button class="swiper-button-prev"></button>
                                                            <div class="product-label-group">
                                                                <label class="product-label label-discount">25% Off</label>
                                                            </div>
                                                        </div>
                                                        <div class="product-thumbs-wrap swiper-container"
                                                             data-swiper-options="{
                                                                 'direction': 'vertical',
                                                                 'breakpoints': {
                                                                     '0': {
                                                                         'direction': 'horizontal',
                                                                         'slidesPerView': 4
                                                                     },
                                                                     '992': {
                                                                         'direction': 'vertical',
                                                                         'slidesPerView': 'auto'
                                                                     }
                                                                 }
                                                             }">
                                                            @php
                                                                $images = explode(",", $sproduct->images);
                                                            @endphp
                                                            <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                                                @foreach ($images as $image)
                                                                    @if ($image)
                                                                        <div class="product-thumb swiper-slide">
                                                                            <img src="{{ asset('storage/gallery/' . $image) }}"
                                                                                 alt="Product thumb" width="60" height="68"/>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="product-details scrollable">
                                                        <h2 class="product-title mb-1">
                                                            <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}">
                                                                {{ $sproduct->name }} <i>{{ $sproduct->name }}</i>
                                                            </a>
                                                        </h2>
                                                        <hr class="product-divider">
                                                        <div class="product-price">
                                                            <ins class="new-price ls-50">
                                                                NGN {{ number_format($sproduct->sale_price) }} - NGN {{ number_format($sproduct->regular_price) }}
                                                            </ins>
                                                        </div>
                                                        <div class="product-countdown-container flex-wrap">
                                                            <label class="mr-2 text-default">Offer Ends In:</label>
                                                            <div class="product-countdown countdown-compact"
                                                                 data-until="{{ \Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d H:i:s') }}"
                                                                 data-compact="true">
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                        </div>
                                                        <div class="product-variation-price">
                                                            NGN {{ number_format($sproduct->sale_price) }}
                                                        </div>
                                                        <div class="product-form pt-4">
                                                            @if ($sproduct->stock_status == "outofstock")
                                                                <span class="btn btn-info">Out Of Stock</span>
                                                            @else
                                                                @php $price = $sproduct->sale_price ?: $sproduct->regular_price; @endphp
                                                                <button class="btn btn-primary btn-cart"
                                                                        wire:click.prevent="store({{ $sproduct->id }}, '{{ $sproduct->name }}', {{ $price }})">
                                                                    <i class="w-icon-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            @endif
                                                        </div>
                                                        <div class="social-links-wrapper mt-1">
                                                            <div class="social-links">
                                                                <div class="social-icons social-no-color border-thin">
                                                                    <div class="addthis_inline_share_toolbox"></div>
                                                                </div>
                                                            </div>
                                                            <span class="divider d-xs-show"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <button class="swiper-button-prev"></button>
                            <button class="swiper-button-next"></button>
                        </div>
                    </div>
                    
                 </div>
             </div>
             <div class="col-lg-3 mb-4">
                 <div class="widget widget-products widget-products-bordered h-100">
                     <div class="widget-body br-sm h-100">
                         <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Top Selling Products</h4>
                         <div class="swiper">
                             <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                 'slidesPerView': 1,
                                 'spaceBetween': 20,
                                 'breakpoints': {
                                     '576': {
                                         'slidesPerView': 2
                                     },
                                     '768': {
                                         'slidesPerView': 3
                                     },
                                     '992': {
                                         'slidesPerView': 1
                                     }
                                 }
                             }">
                                 <div class="swiper-wrapper row cols-lg-1 cols-md-3">
                                     <div class="swiper-slide product-widget-wrap">
                                         @foreach($topsellingproduct1 as $topsellingproduct1)
                                         <div class="product product-widget bb-no">
                                             <figure class="product-media">
                                                 <a href="{{ route('product.details',['slug'=>$topsellingproduct1->slug]) }}">
                                                     <img src="{{ asset('storage/shop/'. $topsellingproduct1->image ) }}"
                                                         alt="{{ $topsellingproduct1->name }}" width="105" height="118" />
                                                 </a>
                                             </figure>
                                             <div class="product-details">
                                                 <h4 class="product-name">
                                                     <a href="{{ route('product.details',['slug'=>$topsellingproduct1->slug]) }}">{{ $topsellingproduct1->name }}</a>
                                                 </h4>
                                                 <div class="ratings-container">
                                                     <div class="ratings-full">
                                                         <span class="ratings" style="width: 60%;"></span>
                                                         <span class="tooltiptext tooltip-top"></span>
                                                     </div>
                                                 </div>
                                                 <div class="product-price">
                                                     @if ($topsellingproduct1->sale_price =="")
                                                     <ins class="new-price">NGN {{ number_format($topsellingproduct1->regular_price ) }}</ins>
                                                     @else
                                                     <ins class="new-price">NGN {{  number_format($topsellingproduct1->sale_price) }}</ins>
                                                     @endif
                                                    
                                                 </div>
                                             </div>
                                         </div>
                                         @endforeach
                                     </div>
                                     
                                     <div class="swiper-slide product-widget-wrap">
                                         @foreach ($topsellingproduct2 as $topsellingproduct2 )
                                         <div class="product product-widget bb-no">
                                             <figure class="product-media">
                                                 <a href="{{ route('product.details',['slug'=>$topsellingproduct2->slug]) }}">
                                                     <img src="{{ asset('storage/shop/'. $topsellingproduct2->image ) }}"
                                                         alt="{{ $topsellingproduct2->name }}" width="105" height="118" />
                                                 </a>
                                             </figure>
                                             <div class="product-details">
                                                 <h4 class="product-name">
                                                     <a href="{{ route('product.details',['slug'=>$topsellingproduct2->slug]) }}">{{ $topsellingproduct2->name }}</a>
                                                 </h4>
                                                 <div class="ratings-container">
                                                     <div class="ratings-full">
                                                         <span class="ratings" style="width: 60%;"></span>
                                                         <span class="tooltiptext tooltip-top"></span>
                                                     </div>
                                                 </div>
                                                 <div class="product-price">
                                                     @if ($topsellingproduct2->sale_price =="")
                                                     <ins class="new-price">NGN {{ number_format($topsellingproduct2->regular_price )}}</ins>
                                                     @else
                                                     <ins class="new-price">NGN {{ number_format($topsellingproduct2->sale_price) }}</ins>
                                                     @endif
                                                 </div>
                                             </div>
                                         </div>
                                         @endforeach
                                     </div>
                                     <div class="swiper-slide product-widget-wrap">
                                     @foreach ($topsellingproduct3 as $topsellingproduct3)
                                         <div class="product product-widget bb-no">
                                             <figure class="product-media">
                                                 <a href="{{ route('product.details',['slug'=>$topsellingproduct3->slug]) }}">
                                                     <img src="{{ asset('storage/shop/'. $topsellingproduct3->image ) }}"
                                                         alt="{{ $topsellingproduct3->name }}" width="105" height="118" />
                                                 </a>
                                             </figure>
                                             <div class="product-details">
                                                 <h4 class="product-name">
                                                     <a href="{{ route('product.details',['slug'=>$topsellingproduct3 ->slug]) }}">{{ $topsellingproduct3->name }}</a>
                                                 </h4>
                                                 <div class="ratings-container">
                                                     <div class="ratings-full">
                                                         <span class="ratings" style="width: 100%;"></span>
                                                         <span class="tooltiptext tooltip-top"></span>
                                                     </div>
                                                 </div>
                                                 <div class="product-price">
                                                     @if ($topsellingproduct3->sale_price =="")
                                                     <ins class="new-price">NGN {{ number_format($topsellingproduct3->regular_price) }}</ins>
                                                     @else
                                                     <ins class="new-price">NGN {{ number_format($topsellingproduct3->sale_price) }}</ins>
                                                     @endif
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                     </div>
                                 </div>
                                 <button class="swiper-button-next"></button>
                                 <button class="swiper-button-prev"></button>
                             </div>
                         </div>
   
                     </div>
                 </div>
             </div>
         </div>
         <!-- End of Deals Wrapper -->
     </div>
   
     <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
         <div class="container pb-2">
             <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of The Month</h2>
             <div class="swiper">
                 <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
                     'spaceBetween': 20,
                     'slidesPerView': 2,
                     'breakpoints': {
                         '576': {
                             'slidesPerView': 3
                         },
                         '768': {
                             'slidesPerView': 5
                         },
                         '992': {
                             'slidesPerView': 6
                         }
                     }
                 }">
                     <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                         @foreach ( $categories as  $category)
                         <div
                         class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                         <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" class="category-media">
                             <img src="{{ asset('storage/categories/'. $category->image ) }}" alt="{{ $category->name }}"
                                 width="130" height="130">
                         </a>
                         <div class="category-content">
                             <h4 class="category-name">{{ $category->name }}</h4>
                             <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}"
                                 class="btn btn-primary btn-link btn-underline">Shop
                                 Now</a>
                         </div>
                     </div>
                         @endforeach
                         
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- End of .category-section top-category -->
   
     <div class="container">
         <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
         </h2>
         <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
             <ul class="nav nav-tabs justify-content-center" role="tablist">
                 <li class="nav-item mr-2 mb-2">
                     <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
                 </li>
                 {{-- <li class="nav-item mr-2 mb-2">
                     <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
                 </li> --}}
                 <li class="nav-item mr-2 mb-2">
                     <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">most popular</a>
                 </li>
                 <li class="nav-item mr-0 mb-2">
                     <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
                 </li>
             </ul>
         </div>
         <!-- End of Tab -->
         <div class="tab-content product-wrapper appear-animate">
             <div class="tab-pane active pt-4" id="tab1-1">
                 <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                    @foreach ($lproducts as $lproducts)
                     <div class="product-wrap">
                         <div class="product text-center">
                             <figure class="product-media" >
                                 <a href="{{ route('product.details',['slug'=>$lproducts->slug]) }}">
                                     <img src="{{ asset('storage/shop/'. $lproducts->image ) }}" alt="{{ $lproducts->name }}" width="300" height="338" />
                                 </a>
                                 
                             <div class="product-details">
                                 <a href="{{ route('product.details',['slug'=>$lproducts->slug]) }}">{{ $lproducts->name }}</a>
                                 <div class="ratings-container">
                                     <div class="ratings-full">
                                         @foreach ($lproducts->orderItems->where('rstatus',1) as $orderItem )
                                         @php
                                            $avgrating = 0;
                                             $avgrating =$avgrating + $orderItem->review->rating;
                                         @endphp
                                         <span class="ratings" style="width: {{ $orderItem->review->rating * 20 }}%;"></span>
                                         <span class="tooltiptext tooltip-top"></span>
                                        @endforeach
                                     </div>
                                     <a href="#" class="rating-reviews">({{ $lproducts->orderItems->where('rstatus', 1)->count() }} reviews)</a>
                                 </div>
                                 <div class="product-price">
                                     @if ($lproducts->sale_price == "")
                                     <ins class="new-price">NGN {{ number_format($lproducts->regular_price )}}</ins>
                                     @else
                                     <ins class="new-price">NGN {{ number_format($lproducts->sale_price) }}</ins><del
                                     class="old-price"> NGN {{ number_format( $lproducts->regular_price) }}</del>
                                     @endif
                                 </div>
                                 <div>
                                     @if ($lproducts->stock_status == "outofstock")
                                     <span class="btn btn-info"> Out Of Stock</span> 
                                     @else
                                     @if ($lproducts->sale_price == "")
                                     <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $lproducts->id}},'{{ $lproducts->name }}',{{ $lproducts->regular_price }})"> add to cart</a> 
                                     @else
                                     <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $lproducts->id}},'{{ $lproducts->name }}',{{ $lproducts->sale_price }})"> add to cart</a> 
                                     @endif
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                    @endforeach
   
                 </div>
             </div>
             <!-- End of Tab Pane -->
             <!-- End of Tab Pane -->
             <div class="tab-pane pt-4" id="tab1-3">
                 <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                     @foreach ($pproducts as $pproducts)
                     <div class="product-wrap">
                         <div class="product text-center">
                             <figure class="product-media">
                                 <a href="{{ route('product.details',['slug'=>$pproducts->slug]) }}">
                                     <img src="{{ asset('storage/shop/'. $pproducts->image ) }}" alt="Product"
                                         width="300" height="338" />
                                 </a>
                                
                             </figure>
                             <div class="product-details">
                                 <h4 class="product-name"><a href="{{ route('product.details',['slug'=>$pproducts->slug]) }}">{{ $pproducts->name }}
                                     </a></h4>
                                 <div class="ratings-container">
                                     <div class="ratings-full">
                                         @foreach ($lproducts->orderItems->where('rstatus',1) as $orderItem )
                                         @php
                                            $avgrating = 0;
                                             $avgrating =$avgrating + $orderItem->review->rating;
                                         @endphp
                                         <span class="ratings" style="width: {{ $orderItem->review->rating * 20 }}%;"></span>
                                         <span class="tooltiptext tooltip-top"></span>
                                        @endforeach
                                     </div>
                                     <a href="#" class="rating-reviews">({{ $lproducts->orderItems->where('rstatus', 1)->count() }} reviews)</a>
                                 </div>
                                 <div class="product-price">
                                     @if($pproducts->sale_price == "")
                                     <ins class="new-price">NGN {{ number_format($pproducts->regular_price) }}</ins>
                                     @else
                                     <ins class="new-price">NGN {{number_format($pproducts->sale_price )}}</ins><del
                                     class="old-price"> NGN {{ number_format( $pproducts->regular_price) }}</del>
                                     @endif
                                 </div>
                                 <div>
                                     @if ($pproducts->stock_status == "outofstock")
                                     <span class="btn btn-info"> Out Of Stock</span> 
                                     @else
                                     @if ($pproducts->sale_price == "")
                                     <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $pproducts->id}},'{{ $pproducts->name }}',{{ $pproducts->regular_price }})"> add to cart</a> 
                                     @else
                                     <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $pproducts->id}},'{{ $pproducts->name }}',{{ $pproducts->sale_price }})"> add to cart</a> 
                                     @endif
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                     @endforeach
                 </div>
             </div>
             <!-- End of Tab Pane -->
             <div class="tab-pane pt-4" id="tab1-4">
                 <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                    @foreach ($fproducts as $fproduct)
                     <div class="product-wrap">
                         <div class="product text-center">
                             <figure class="product-media">
                                 <a href="{{ route('product.details',['slug'=>$fproduct->slug]) }}" >
                                     <img src=" {{ asset('storage/shop/'. $fproduct->image ) }}" alt="Product"
                                         width="300" height="338" />
                                 </a>
                             
                             </figure>
                             <div class="product-details">
                                 <h4 class="product-name"><a href="{{ route('product.details',['slug'=>$fproduct->slug]) }}">{{ $fproduct->name }}</a>
                                 </h4>
                                 <div class="ratings-container">
                                     <div class="ratings-full">
                                         @foreach ($fproduct->orderItems->where('rstatus',1) as $orderItem )
                                             @php
                                                $avgrating = 0;
                                                 $avgrating =$avgrating + $orderItem->review->rating;
                                             @endphp
                                             <span class="ratings" style="width: {{ $orderItem->review->rating * 20 }}%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                            @endforeach
                                     </div>
                                     <a href="#" class="rating-reviews">({{ $fproduct->orderItems->where('rstatus', 1)->count() }} reviews)</a>
                                 </div>
                                 <div class="product-price">
                                     @if($fproduct->sale_price == "")
                                     <ins class="new-price">NGN {{ number_format($fproduct->regular_price) }}</ins>
                                     @else
                                     <ins class="new-price">NGN {{ number_format($fproduct->sale_price) }}</ins><del
                                     class="old-price"> NGN {{ number_format( $fproduct->regular_price) }}</del>
                                     @endif
                                 </div>
                                 <div>
                                     @if ($fproduct->stock_status == "outofstock")
                                     <span class="btn btn-info"> Out Of Stock</span> 
                                     @else
                                     @if ($fproduct->sale_price == "")
                                     <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $fproduct->id}},'{{ $fproduct->name }}',{{ $fproduct->regular_price }})"> add to cart</a> 
                                     @else
                                     <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $fproduct->id}},'{{ $fproduct->name }}',{{ $fproduct->sale_price }})"> add to cart</a> 
                                     @endif
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                     @endforeach
                 </div>
             </div>
             <!-- End of Tab Pane -->
         </div>
         <!-- End of Tab Content -->
   
         <div class="row category-cosmetic-lifestyle appear-animate mb-5">
             <div class="col-md-6 mb-4">
                 <div class="banner banner-fixed category-banner-1 br-xs">
                     <figure>
                         <img src="{{ asset('assets/images/demos/demo1/categories/3-1.jpg')}}" alt="Category Banner"
                             width="610" height="200" style="background-color: #3B4B48;" />
                     </figure>
                     <div class="banner-content y-50 pt-1">
                         <h5 class="banner-subtitle font-weight-bold text-uppercase">Natural Process.</h5>
                         <h3 class="banner-title font-weight-bolder text-capitalize text-white">Cosmetic
                             Makeup<br>Professional</h3>
                         <a href="product-category/health-beauty"
                             class="btn btn-white btn-link btn-underline btn-icon-right">Shop Now<i
                                 class="w-icon-long-arrow-right"></i></a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 mb-4">
                 <div class="banner banner-fixed category-banner-2 br-xs">
                     <figure>
                         <img src="{{ asset('assets/images/demos/demo1/categories/3-2.jpg')}}" alt="Category Banner"
                             width="610" height="200" style="background-color: #E5E5E5;" />
                     </figure>
                     <div class="banner-content y-50 pt-1">
                         <h5 class="banner-subtitle font-weight-bold text-uppercase">Trending Now!</h5>
                         <h3 class="banner-title font-weight-bolder text-capitalize">Women's
                             Lifestyle<br>Collection</h3>
                         <a href="product-category/women-fashion/women-fashion"
                             class="btn btn-dark btn-link btn-underline btn-icon-right">Shop Now<i
                                 class="w-icon-long-arrow-right"></i></a>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End of Category Cosmetic Lifestyle -->
   
        {{-- begining of category --}}
        @foreach ($categories as  $category)
        @php
            $c_products = DB::table('products')->where('category_id', $category->id)->get()->take($no_of_products);
        @endphp
        <div class="product-wrapper-1 appear-animate mb-5">
            <div class="title-link-wrapper pb-1 mb-4">
                <h2 class="title ls-normal mb-0">{{ $category->name }}</h2>
                <a href="{{ route('product.category',['category_slug'=>$category->slug])}}" class="font-size-normal font-weight-bold ls-25 mb-0">More
                    Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 mb-4">
                    <div class="banner h-100 br-sm" style="background-image: url({{ asset('storage/banners/'. $category->banner ) }}); 
                        background-color: #ebeced;">
                        <div class="banner-content content-top">
                            <h5 class="banner-subtitle font-weight-normal mb-2"> New Arrivals</h5>
                            <hr class="banner-divider bg-dark mb-2">
                            <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                             {{ $category->name }}<br> <span
                                    class="font-weight-normal text-capitalize">Collection</span>
                            </h3>
                            <a href="{{ route('product.category',['category_slug'=>$category->slug])}}"
                                class="btn btn-dark btn-primary btn-rounded btn-sm">shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Banner -->
                <div class="col-lg-9 col-sm-8">
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 2,
                        'breakpoints': {
                            '992': {
                                'slidesPerView': 3
                            },
                            '1200': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                            @foreach ($c_products as $c_product )
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',['slug'=>$c_product->slug]) }}"  >
                                            <img src="{{ asset('storage/shop/'. $c_product->image ) }}" alt="{{ $c_product->name }}"
                                                width="216" height="243" />
                                        </a>
                                     
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="#">{{ $c_product->name }}</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                           
                                        </div>
                                        @if ($c_product->sale_price == '')
                                        <div class="product-price">
                                         <ins class="new-price">NGN {{ number_format($c_product->regular_price )}}</ins>
                                          </div>
                                          @else
                                          <div class="product-price">
                                             <ins class="new-price">NGN {{ number_format($c_product->sale_price )}}</ins><del
                                                 class="old-price"> NGN{{ number_format($c_product->regular_price) }}</del>
                                         </div>
                                        @endif
                                    </div>
                                    <div>
                                     @if ($c_product->stock_status == "outofstock")
                                        <span class="btn btn-info"> Out Of Stock</span> 
                                        @else
                                        @if ($c_product->sale_price == "")
                                        <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $c_product->id}},'{{ $c_product->name }}',{{ $c_product->regular_price }})"> add to cart</a> 
                                        @else
                                        <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $c_product->id}},'{{ $c_product->name }}',{{ $c_product->sale_price }})"> add to cart</a> 
                                        @endif
                                     @endif
                                 </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        
   
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        {{-- end of category --}}
   
         <div class="banner banner-fashion appear-animate br-sm mb-9" style="background-image: url({{ asset('assets/images/demos/demo1/banners/4.jpg')}});
             background-color: #383839;">
             <div class="banner-content align-items-center">
                 <div class="content-left d-flex align-items-center mb-3">
                     <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                         25
                         <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                     </div>
                     <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
                 </div>
                 <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                     <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                         <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For Today's
                             Fashion</h3>
                     </div>
                     <a href="product-category/fashion"
                         class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                             class="w-icon-long-arrow-right"></i></a>
                 </div>
             </div>
         </div>
         <!-- End of Banner Fashion -->
   
         
         <!-- End of Product Wrapper 1 -->
   
         <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Clients</h2>
         <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{
             'spaceBetween': 0,
             'slidesPerView': 2,
             'breakpoints': {
                 '576': {
                     'slidesPerView': 3
                 },
                 '768': {
                     'slidesPerView': 4
                 },
                 '992': {
                     'slidesPerView': 5
                 },
                 '1200': {
                     'slidesPerView': 6
                 }
             }
         }">
             <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                 <div class="swiper-slide brand-col">
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/1.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/2.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                 </div>
                 <div class="swiper-slide brand-col">
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/3.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/4.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                 </div>
                 <div class="swiper-slide brand-col">
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/5.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/6.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                 </div>
                 <div class="swiper-slide brand-col">
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/7.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/8.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                 </div>
                 <div class="swiper-slide brand-col">
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/9.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/10.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                 </div>
                 <div class="swiper-slide brand-col">
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/11.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                     <figure class="brand-wrapper">
                         <img src="{{ asset('assets/images/demos/demo1/brands/12.png')}}" alt="Brand" width="410"
                             height="186" />
                     </figure>
                 </div>
             </div>
         </div>
         <!-- End of Brands Wrapper -->
         <!-- End of Reviewed Producs -->
     </div>
     <!--End of Catainer -->
   </main>
   @section('title', 'Your no.1 Online Shopping Mall | Welcome-Home')
   </div>
   <!-- End of Main -->
   