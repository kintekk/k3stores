<div>
    <style>
        .content {
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }
        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Total Revenue</span>
                                    <span class="icon-stat-value">NGN {{ $totalRevenue }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Total Sales</span>
                                    <span class="icon-stat-value">{{ $totalSales }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Today Revenue</span>
                                    <span class="icon-stat-value">NGN {{ $todayRevenue }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-stat">
                            <div class="row">
                                <div class="col-xs-8 text-left">
                                    <span class="icon-stat-label">Today Sales</span>
                                    <span class="icon-stat-value">{{ $todaySales }}</span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                                </div>
                            </div>
                            <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#all-orders" class="nav-link">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#all-category" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#all-coupons" class="nav-link">All Coupons</a>
                        </li>
                        <li class="nav-item">
                            <a href="#all-messages" class="nav-link">Contact Messages</a>
                        </li>
                        <li class="nav-item">
                            <a href="#all-products" class="nav-link">Products</a>
                        </li>
                        <div class="icon-box-content">
                            <a href="#all-homeslider" class="nav-link">Manage HomeSlider</a>
                        </div>
                        <div class="icon-box-content">
                            <a href="#homecategories" class="nav-link">Manage Home Categories</a>
                        </div>
                        <li class="nav-item">
                            <div class="icon-box-content">
                                <a href="#sales" class="nav-link">Sales Setting</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="icon-box-content">
                                <a href="#attribute" class="nav-link">Product Attributes</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="icon-box-content">
                                <a href="#settings" class="nav-link">Setting</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="icon-box-content">
                                <a href="#subscribers" class="nav-link">Subscribers</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#account-details" class="nav-link">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" class="nav-link">Account Details</a>
                        </li>
                        <li class="link-item">
                            <a class="dropdown-item nav-link text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
                                not
                                <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>?
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your <a href="#all-orders"
                                    class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                    and billing
                                    addresses</a>, and
                                <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                    account details.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#all-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-orders">
                                                <i class="w-icon-orders"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#all-messages" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-download">
                                                <i class="w-icon-envelop"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Contact Messages</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-address">
                                                <i class="w-icon-cog"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Change Password</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#profile" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-account">
                                                <i class="w-icon-user"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#all-products" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-wishlist">
                                                <i class="w-icon-desktop"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">All Products</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-logout">
                                                <i class="w-icon-logout"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                </p>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Other tabs --}}
                        <div class="tab-pane mb-4" id="all-coupons">
                            @livewire('admin.admin-coupon-component')
                        </div>
                        <div class="tab-pane mb-4" id="all-category">
                            @livewire('admin.admin-category-component')
                        </div>
                        <div class="tab-pane mb-4" id="all-orders">
                            @livewire('admin.admin-order-component')
                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="icon-box icon-box-side icon-box-light">
                                {{-- @livewire('user.profile-component') --}}
                            </div>
                        </div>
                        <div class="tab-pane mb-4" id="all-messages">
                            @livewire('admin.admin-contact-component')
                        </div>
                        <div class="tab-pane mb-4" id="all-products">
                            @livewire('admin.admin-product-component')
                        </div>
                        <div class="tab-pane mb-4" id="all-homeslider">
                            @livewire('admin.admin-home-slider-component')
                        </div>
                        <div class="tab-pane mb-4" id="sales">
                            @livewire('admin.admin-sale-component')
                        </div>
                        <div class="tab-pane mb-4" id="attribute">
                            @livewire('admin.admin-attribute-component')
                        </div>
                        <div class="tab-pane mb-4" id="settings">
                            @livewire('admin.admin-setting-component')
                        </div>
                        <div class="tab-pane mb-4" id="subscribers">
                            @livewire('admin.admin-subscribers-component')
                        </div>
                        <div class="tab-pane mb-4" id="homecategories">
                            @livewire('admin.admin-home-category-component')
                        </div>
                        <div class="tab-pane mb-4" id="account-details">
                            {{-- @livewire('user.user-change-password-component') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
</div>