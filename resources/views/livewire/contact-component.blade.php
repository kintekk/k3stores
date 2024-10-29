<div>
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Contact Us</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3">Contact
                        Information
                    </h3>
                    <p class="text-center">We believe in support and service,
                       so we are here to serve you, Tell us what the problem is!</p>
                </section>
                <!-- End of Contact Title Section -->

                <section class="contact-information-section mb-10">
                    <div class=" swiper-container swiper-theme " data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 1,
                        'breakpoints': {
                            '480': {
                                'slidesPerView': 2
                            },
                            '768': {
                                'slidesPerView': 3
                            },
                            '992': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                        <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-email">
                                    <i class="w-icon-envelop-closed"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">E-mail Address</h4>
                                    @if (!empty($setting->email) )
                                    <p>{{ $setting->email }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-headphone">
                                    <i class="w-icon-headphone"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Phone Number</h4>
                                    <p>(+234) @if(!empty($setting->phone )){{ $setting->phone }}@endif / (+234)@if(!empty($setting->phone2 )){{ $setting->phone2 }}@endif</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-map-marker">
                                    <i class="w-icon-map-marker"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Address</h4>
                                    <p>@if(!empty($setting->address)){{ $setting->address }}@endif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">
                <section class="contact-section"> 
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">People usually ask these</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse1" class="collapse" >How can I cancel my order?</a>
                                    </div>
                                    <div id="collapse1" class="card-body expanded">
                                        <p class="mb-0">
                                          It is absolutely easy and simple to cancel products order with K3marts in case you change your mind. 
                                          All you have to do is to log into your account go to your dashboard there your will find list of your orders open the details of the order you would like to cancel
                                           and there you'll find the cancel button.
                                        </p>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                    </div>
                                    <div id="collapse2" class="card-body collapsed">
                                        <p class="mb-0">
                                           Your registration can be delayed in situations where you've tried registering multiple times using the same details. 
                                            In case as this wait for some minutes then cross check the inputs again incase of any typo and try again.
                                        </p>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                    </div>
                                    <div id="collapse3" class="card-body collapsed">
                                        <p class="mb-0">
                                           Buying prodoucts on K3marts is simplified, all you have to do is be a nember by registering.
                                           Then go ahead to select the products you would love to buy and add them to the cart.
                                           At the check out you can decide which payment mode that suit your style the most
                                        </p>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse4" class="expand">How can I track an order?</a>
                                    </div>
                                    <div id="collapse4" class="card-body collapsed">
                                        <p class="mb-0">
                                          To track your order click on the track button at the top-right,
                                          enter your orderId and track, we have 3 tracking status; Processing; Dispatched; Delivered.
                                        
                                        </p>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse5" class="expand">How can I get money back?</a>
                                    </div>
                                    <div id="collapse5" class="card-body collapsed">
                                        <p class="mb-0">
                                            You can request for a refund if we mistakenly shipped a defective or wrong product to you, if the product isn't of the communicated quality, and if there's malfunction of any part incase of electronic products.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Send Us a Message</h4>
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="sendMessage">
                                @csrf
                                <div class="form-group">
                                    <label for="">Your Name</label>
                                    <input type="text" placeholder="enter your name" class="form-control" wire:model="name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Your Email</label>
                                    <input type="email"  class="form-control" placeholder="give Us Your Email" wire:model="email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Your Phone</label>
                                    <input type="text"  class="form-control" placeholder="Enter your Phone number" wire:model="phone">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea  cols="30" rows="5"
                                        class="form-control" placeholder="Your Message here" wire:model="comment"></textarea>
                                        @error('comment')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            {{-- <div class="google-map contact-google-map" id="googlemaps">
                <iframe src="{{ $setting->map }}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div> --}}
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
    @section('title', 'Your no.1 Online Shopping Mall | Contact Us')
</div>
