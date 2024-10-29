<div>
    <!-- Start of Main -->
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="/">Home</a></li>
                    <li><a href="shop">Shop</a></li>
                    <li>Searched Product</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb-nav -->

        <!-- Optional External CSS -->
        <style>
            .fill-heart {
                color: #04078b !important;
            }
        </style>

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
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>All Categories</span></h3>
                                    <ul class="widget-body filter-items search-ul">
                                        @foreach ($categories as $category)
                                            <li><a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->
                            </div>
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Main Content -->
                    <div class="main-content">
                        <!-- Start of Shop Banner -->
                        <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                            style="background-image: url(assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                            <div class="banner-content">
                                <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">For Your Search.....</h3>
                                <a href="#" class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End of Shop Banner -->

                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none">
                                    <i class="w-icon-category"></i><span>Filters</span>
                                </a>
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
                            </div>
                        </nav>

                        @if ($products->count() > 0)
                            <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                @foreach ($products as $product)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                    <img src="{{ asset('storage/shop/' . $product->image) }}" alt="{{ $product->name }}" width="300" height="338" />
                                                </a>
                                                @if ($product->stock_status == "outofstock")
                                                    <span class="btn btn-info">Out Of Stock</span>
                                                @else
                                                    <a href="#" class="btn btn-primary btn-cart" title="Add to cart" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price ?: $product->regular_price }})">Add to cart</a>
                                                @endif
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="{{ route('product.category', ['category_slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(3 reviews)</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">
                                                        NGN {{ number_format($product->sale_price ?: $product->regular_price) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p style="padding-top: 30px; color:red">No Product Found!</p>
                        @endif

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
    <!-- End of Main -->
</div>
