<div>
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li>K3marts</li>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb-nav -->
    
        <div class="page-content mb-10">
            <div class="container">
                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
    
                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>All Categories</span></h3>
                                    <ul class="widget-body filter-items search-ul">
                                    @foreach ( $categories as $category )
                                        <li>
                                            <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }} @if ($category->subCategories->count() > 0) <i class="">+</i> @endif</a>
                                            @if ($category->subCategories->count() > 0)
                                            <ul class="widget-body filter-items search-ul">
                                                @foreach ($category->subCategories as $subcategory )
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
                                <!-- End of Collapsible Widget -->
    
                                <!-- Start of Collapsible Widget for Price Filter -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">Price <span class="text-info">NGN {{ number_format($min_price) }} - NGN {{ number_format($max_price) }}</span></h3>
                                    <div class="widget-body">
                                        <div id="slider" wire:ignore></div>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->
    
                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->
    
                    <!-- Start of Main Content -->
                    <div class="main-content">
                        <!-- Start of Shop Banner -->
                        <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                            style="background-image: url({{ asset('assets/images/shop/banner1.jpg') }}); background-color: #FFC74E;">
                            <div class="banner-content">
                                <h4 class="banner-subtitle font-weight-bold">Shop In Styles</h4>
                                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart Sales</h3>
                                <a href="#"
                                     class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i
                                        class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End of Shop Banner -->
    
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                    btn-icon-left d-block d-lg-none"><i class="w-icon-category"></i><span>Filters</span></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control" wire:model="sorting">
                                        <option value="default" selected="selected">Default sorting</option>
                                        <option value="date">Sort by latest</option>
                                        <option value="price-low">Sort by price: low to high</option>
                                        <option value="price-high">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box">
                                    <select name="count" class="form-control" wire:model="pagesize">
                                        <option value="9">Show 9</option>
                                        <option value="12" selected="selected">Show 12</option>
                                        <option value="24">Show 24</option>
                                        <option value="36">Show 36</option>
                                    </select>
                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="shop" class="icon-mode-grid btn-layout active">
                                        <i class="w-icon-grid"></i>
                                    </a>
                                    <a href="shop2" class="icon-mode-list btn-layout">
                                        <i class="w-icon-list"></i>
                                    </a>
                                </div>
                            </div>
                        </nav>
    
                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                            @if ($products->count() > 0)
                            @foreach ($products as $product)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                            <img src="{{ asset('storage/shop/' . $product->image) }}" alt="{{ $product->name }}" width="300" height="338" />
                                        </a>
                                    </figure>
                                    @if ($product->stock_status == "outofstock")
                                    <a href="#" class="btn btn-info btn-cart" title="add to cart">OUT OF STOCK</a>
                                    @else
                                    @if (empty($product->sale_price))
                                    <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Add to Cart</a>
                                    @else
                                    <a href="#" class="btn btn-primary btn-cart" title="add to cart" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})">Add to Cart</a>
                                    @endif
                                    @endif
                                    
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="{{ route('product.category', ['category_slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                @php
                                                    $averageRating = $product->orderItems->where('rstatus', 1)->avg('review.rating');
                                                @endphp
                                                <span class="ratings" style="width: {{ $averageRating * 20 }}%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">({{ $product->orderItems->where('rstatus', 1)->count() }} reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                @if (empty($product->sale_price))
                                                <ins class="new-price">NGN {{ number_format($product->regular_price) }}</ins>
                                                @else
                                                <ins class="new-price">NGN {{ number_format($product->sale_price) }}</ins><del class="old-price">NGN {{ number_format($product->regular_price) }}</del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach 
                            @else
                            <div class="coming-content">
                                <a href="{{ route('shop') }}" class="logo">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="168" height="53">
                                </a>
                                <h2 class="coming-title ls-25">Coming <span>Soon...</span></h2>
                                <p>
                                    We are currently working on awesome new prices and products in this category. Stay tuned for more information.
                                    Subscribe to our newsletter to stay updated on our progress.
                                </p>
                                <div class="countdown countdown-coming" data-until="+10d" data-format="DHMS" data-relative="true">10:00:00</div>
                            </div>
                            @endif
                        </div>
    
                        <div class="toolbox toolbox-pagination justify-content-between">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
    </main>
    @section('title', 'Your no.1 Online Shopping Mall | Product Categories')
    @push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 1000000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });
        slider.noUiSlider.on('update', function(value) {
            @this.set('min_price', value[0]);
            @this.set('max_price', value[1]);
        });
    </script>
    @endpush
</div>
