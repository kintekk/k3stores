<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                 <ul class="comments list-style-none">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <figure class="comment-avatar">
                                                <img src="{{ asset('storage/shop/' .$orderItem->product->image) }}"
                                                    alt="Commenter Avatar" width="90" height="90">
                                            </figure>
                                            <div class="comment-content">
                                                <h4 class="comment-author">
                                                    <a href="{{ route('product.details',['slug'=>$orderItem->product->slug]) }}">{{ $orderItem->product->name }}</a>
                                                    {{-- <span class="comment-date">March 22, 2021 at
                                                        1:54 pm</span> --}}
                                                </h4>
                                             
                                                <p>{!! $orderItem->product->desc !!}</p>
                                            </div>
                                        </div>
                                    </li>
                   
                                </ul>
                <div class="tab-pane" id="product-tab-reviews">
                    <div class="row mb-4">
                        <h4>Write a Review for {{ $orderItem->product->name }}</h4>
                        <div class="col-xl-4 col-lg-5 mb-4">
                            <div class="ratings-wrapper">
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
                                @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                                    
                                @endif
                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                    Review</h3>
                                    <form wire:submit.prevent="addReview">
                                      @csrf
                                         <div class="rating-form">
                                                        <label for="rating">Your Rating Of This Product :</label>
                                                        <span class="rating-stars">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>
                                                        <select name="rating" id="rating" required=""
                                                            style="display:flex;" wire:model="rating">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                        @error('comment')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                        <textarea name="" id="" cols="30" rows="6"  placeholder="Write Your Review Here..." class="form-control" wire:model="comment"></textarea>
                                            @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <input type="submit" class="btn btn-dark">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('title')
    {{ $orderItem->product->name }} Review
    @endsection
    
</div>
