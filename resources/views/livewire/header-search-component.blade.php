<div>
    <style type="text/css">
        a.gflag {
            vertical-align: middle;
            font-size: 16px;
            padding: 1px 0;
            background-repeat: no-repeat;
            background-image: url(//gtranslate.net/flags/16.png);
        }
        a.gflag img {
            border: 0;
        }
        a.gflag:hover {
            background-image: url(//gtranslate.net/flags/16a.png);
        }
        #goog-gt-tt {
            display: none !important;
        }
        .goog-te-banner-frame {
            display: none !important;
        }
        .goog-te-menu-value:hover {
            text-decoration: none !important;
        }
        body {
            top: 0 !important;
        }
        #google_translate_element2 {
            display: none !important;
        }
    </style>
    
    <header class="header header-border">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg" style="color: blue;">Welcome to K3marts Shopping made easy!</p>
                </div>
                <div class="header-right">
                    <!-- Language Dropdown -->
                    <div class="dropdown">
                        <a href="#language">
                            <img src="{{ asset('assets/images/flags/eng.png') }}" alt="ENG Flag" width="14" height="8" class="dropdown-image" />
                            ENG
                        </a>
                        <div class="dropdown-box">
                            <!-- GTranslate Links -->
                            <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position: -0px -0px;">
                                <img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" />
                            </a>
                            <!-- Add other language options similarly -->
                            <select onchange="doGTranslate(this);">
                                <option value="">Select Language</option>
                                <option value="en|zh-CN">Chinese (Simplified)</option>
                                <option value="en|en">English</option>
                                <option value="en|fr">French</option>
                                <option value="en|es">Spanish</option>
                                <option value="en|tr">Turkish</option>
                                <!-- Add more language options as needed -->
                            </select>
                            <div id="google_translate_element2"></div>
                        </div>
                    </div>
                    <!-- End of Language Dropdown -->
    
                    <span class="divider d-lg-show"></span>
                    <a href="{{ route('contact') }}" class="d-lg-show">Help</a>
    
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->utype == 'ADM')
                                <div class="dropdown">
                                    <a href="{{ route('admin.dashboard') }}" class="d-lg-show">My Account</a>
                                    <div class="dropdown-box">
                                        <a href="{{ route('admin.dashboard') }}" class="d-lg-show">Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </div>
                            @elseif (Auth::user()->utype == 'VEN')
                                <div class="dropdown">
                                    <a href="{{ route('vendor.dashboard') }}" class="d-lg-show">My Account</a>
                                    <div class="dropdown-box">
                                        <a href="{{ route('vendor.dashboard') }}" class="d-lg-show">Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="dropdown">
                                    <a href="{{ route('user.dashboard') }}" class="d-lg-show">My Account</a>
                                    <div class="dropdown-box">
                                        <a href="{{ route('user.dashboard') }}" class="d-lg-show">Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @else
                            <a href="{{ route('login') }}"><i class="w-icon-account"></i>Sign In</a>
                            <span class="delimiter d-lg-show">/</span>
                            <a href="{{ route('register') }}" class="ml-0 d-lg-show login register">Register</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        <!-- End of Header Top -->
    
        <div class="header-middle">
            <div class="container">
                <div class="header-left mr-md-4">
                    <a href="#" class="mobile-menu-toggle w-icon-hamburger" aria-label="menu-toggle"></a>
                    <a href="/" class="logo ml-lg-0">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="300" height="85" />
                    </a>
                    <form wire:submit.prevent="searches" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                        <div class="select-box">
                            <select id="category" wire:model="product_cat_id" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <input type="text" 
                               class="form-control" 
                               wire:model="search" 
                               placeholder="Search for products..." 
                               required 
                               autofocus />
                        
                        <button class="btn btn-search" type="submit">
                            <i class="w-icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="header-right ml-4">
                    <div class="header-call d-xs-show d-lg-flex align-items-center">
                        <a href="tel:#" class="w-icon-call"></a>
                        <div class="call-info d-lg-show">
                            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                <a href="mailto:#" class="text-capitalize">Live Chat</a> or :
                            </h4>
                            <a href="tel:#" class="phone-number font-weight-bolder ls-50">{{ $setting->phone ?? '' }}</a>
                        </div>
                    </div>
                    @livewire('cart-count-component')
                </div>
            </div>
        </div>
        <!-- End of Header Middle -->
    
        <div class="header-bottom sticky-content fix-top sticky-header">
            <div class="container">
                <div class="inner-wrap">
                    <div class="header-left">
                        <div class="dropdown category-dropdown has-border" data-visible="true">
                            <a href="#" class="category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                <i class="w-icon-category"></i>
                                <span>Browse Categories</span>
                            </a>
                            <div class="dropdown-box">
                                @foreach ($categories as $category)
                                    <ul class="menu vertical-menu category-menu">
                                        <li>
                                            <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">
                                                <i class="cate-link"><img src="{{ asset('storage/categories/' . $category->image) }}" alt="" /></i>{{ $category->name }}
                                            </a>
                                            @if ($category->subCategories->count() > 0)
                                                <ul>
                                                    @foreach ($category->subCategories as $subcategory)
                                                        <li>
                                                            <a href="{{ route('product.category', ['category_slug' => $subcategory->slug, 'scategory_slug' => $subcategory->slug]) }}">
                                                                {{ $subcategory->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <nav class="main-nav">
                            <ul class="menu active-underline">
                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                    <a href="/">Home</a>
                                </li>
                                <li class="{{ request()->is('shop') ? 'active' : '' }}">
                                    <a href="{{ route('shop') }}">Shop</a>
                                </li>
                                <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">Help</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        {{-- Add additional links or elements if needed --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <script type="text/javascript">
        function googleTranslateElementInit2() {
            new google.translate.TranslateElement({ pageLanguage: 'en', autoDisplay: false }, 'google_translate_element2');
        }
    
    
        /* <![CDATA[ */
        eval(function(p, a, c, k, e, r) {
            e = function(c) {
                return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36));
            };
            if (!''.replace(/^/, String)) {
                while (c--) r[e(c)] = k[c] || e(c);
                k = [function(e) {
                    return r[e];
                }];
                e = function() {
                    return '\\w+';
                };
                c = 1;
            }
            while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
            return p;
        }('6 7(a, b) { n { 4(2.9) { 3 c = 2.9("o"); c.p(b, f, f); a.q(c); } g { 3 c = 2.r(); a.s(\'t\' + b, c); } } u(e) {} } 6 h(a) { 4 (a.8) a = a.8; 4 (a == \'\') v; 3 b = a.w(\'|\')[1]; 3 c; 3 d = 2.x(\'y\'); z (3 i = 0; i < d.5; i++) 4 (d[i].A == \'B-C-D\') c = d[i]; 4 (2.j(\'k\') == E || 2.j(\'k\').l.5 == 0 || c.5 == 0 || c.l.5 == 0) { F(6() { h(a); }, G); } g { c.8 = b; 7(c, \'m\'); 7(c, \'m\'); } }', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}));
        /* ]]> */
    </script>
    
</div>
