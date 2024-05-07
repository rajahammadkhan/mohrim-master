@if ($ThemeSettings('option-project-type', 'coupon'))
    @extends('frontend.layouts.master')
    @section('title')
        {{ config('app.name') }} : Best Coupon and deals
    @endsection
    @section('description')
        {{-- Meta Description here --}}
    @endsection
    @section('keywords')
        {{--   Meta Keywords here --}}
    @endsection
    @section('content')
        {{ $Section('stores') }}
        <div class="container sec-2 ">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12  ">
                    <div class="row  w-100 mx-auto under p-3 mb-4">
                        <div class="col-md-12">
                            {{ $Section('slider') }}
                        </div>
                        <div class="col-12 mb-3">
                            <h1 class="text-uppercase mb-0 fs-3 fw-sm-bold MainHeading">
                                Featured Deals
                            </h1>
                        </div>

                        {{ $Coupons([
                            'search' => false,
                            'limit' => 0,
                            'paginate' => false,
                            'col' => 3,
                            'graph' => 'featured',
                            'type' => 'deals',
                        ]) }}
                    </div>



                    <div class="row  w-100 mx-auto under p-3 mb-4">
                        <div class="col-md-12">
                            {{ $Section('slider') }}
                        </div>
                        <div class="col-12 mb-3">
                            <h2 class="text-uppercase mb-0 fs-3 fw-sm-bold MainHeading">
                                Featured Coupons
                            </h2>
                        </div>

                        {{ $Coupons([
                            'search' => false,
                            'limit' => 0,
                            'paginate' => false,
                            'col' => 3,
                            'graph' => 'featured',
                            'type' => 'coupon',
                        ]) }}
                    </div>

                    <div class="row  w-100 mx-auto under p-3 mb-4">
                        <div class="col-12 mb-3">
                            <h2 class="text-uppercase mb-0 fs-3 MainHeading fw-sm-bold">
                                Trending Deals
                            </h2>
                        </div>
                        {{ $Coupons([
                            'search' => false,
                            'limit' => 0,
                            'paginate' => false,
                            'col' => 3,
                            'graph' => 'trending',
                            'type' => 'deals',
                        ]) }}
                    </div>

                    <div class="row  w-100 mx-auto under p-3 mb-4">
                        <div class="col-12 mb-3">
                            <h2 class="text-uppercase mb-0 fs-3 MainHeading fw-sm-bold">
                                Trending Coupons
                            </h2>
                        </div>
                        {{ $Coupons([
                            'search' => false,
                            'limit' => 0,
                            'paginate' => false,
                            'col' => 3,
                            'graph' => 'trending',
                            'type' => 'coupon',
                        ]) }}
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <?php $ads = DB::table('sliders')
                        ->where('status', 1)
                        ->where('type', 'ad')
                        ->get(); ?>
                    @foreach ($ads as $ad)
                        <div class="row w-100 mx-auto">
                            <div class="col-12 p-0">
                                <a target="_blank" href="{{ $ad->url }}">
                                    <img src="{{ asset('images/slider/' . $ad->image) }}" class="w-100"
                                        alt="{{ $ad->image }}">
                                </a>
                            </div>

                        </div>
                    @endforeach
                    <div class="row under w-100 mx-auto my-2">
                        <div class="col-12  px-3">
                            <p class="text-uppercase mb-0 fs-3 MainHeading fw-sm-bold">
                                Hot Deals
                            </p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            {{ $Coupons([
                                'search' => false,
                                'limit' => 0,
                                'paginate' => false,
                                'col' => 12,
                                'graph' => 'hot',
                                'template' => 'hot-deals',
                            ]) }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $Snippet('testimonial') }}
        <?php $popup = DB::table('sliders')
            ->where('status', 1)
            ->where('type', 'popup')
            ->get()
            ->last(); ?>
        @if ($popup != null)
            <!-- Button trigger modal -->
            <button type="button" id="loginActivity-minor" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModal">

            </button>
            <!-- Modal -->
            <div class="modal fade ads" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content position-relative border-0 modal-dialog-centered"
                        style="background: url('{{ asset('images/slider/' . $popup->image) }}');    height: 70vh;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;">
                        <button class="position-absolute top-0 end-0 bg-transparent" type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-footer border-0 text-center d-block ">
                            <a href="{{ $popup->url }}" class="btn btn-light rounded-5 px-4">
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <style>
            .ads .modal-footer {
                position: absolute;
                bottom: 0;
                z-index: 99999999;
                width: 100%;
            }

            button.position-absolute.top-0.end-0.bg-transparent {
                border: 1px solid white;
                height: 35px;
                width: 35px;
                font-size: 24px !important;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                color: white;
                position: absolute;
                right: -5% !important;
            }

            #loginActivity-minor {
                position: fixed;
                right: 0;
                bottom: 270px;
                width: 88px;
                height: 74px;
                background: url("{{ asset('/images/loginActivityMinor.webp') }}")no-repeat;
                background-size: 100%;
                z-index: 1000;
                cursor: pointer;
                border: 0;
                box-shadow: unset !important;
            }
        </style>


        <script>
            $(document).ready(function($) {
                setTimeout(function() {
                    $('#loginActivity-minor').trigger('click');
                }, 5000);
            });
        </script>
    @endsection
@endif





@if ($ThemeSettings('option-project-type', 'ecommerce'))
    @extends('frontend.ecommerce-layouts.master')
    @section('content')
        <!-- BANNER SECTION BEGIN -->
        <section class="banner-sec mx-auto">
            <div class="container">
                <!--     <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="banner-img w-100">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100"
                                                src="{{ asset('frontend/ecommerce/images/banner-fa1.jpg') }}" alt="First slide"
                                                class="img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100"
                                                src="{{ asset('frontend/ecommerce/images/banner-fa2.jpg') }}"
                                                alt="Second slide" class="img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100"
                                                src="{{ asset('frontend/ecommerce/images/banner-fa3.jpg') }}" alt="Third slide"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                <!--    <div class="row simp-img-row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <img src="{{ asset('frontend/ecommerce/images/smc1.jpg') }}" alt="image" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <img src="{{ asset('frontend/ecommerce/images/smc2.jpg') }}" alt="image" class="img-fluid">
                        </div>
                    </div>-->
                <div class="row simp-img-row position-relative">
                    <div class="col-md-6 col-sm-6 col-6">
                        <img src="{{ asset('images/banner1.jpeg') }}" draggable="false" alt="image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <img src="{{ asset('images/banner2.jpeg') }}" draggable="false" alt="image" class="img-fluid">
                    </div>
                    <div
                        class="col-auto d-md-flex align-items-center justify-content-center flex-column bannerSec mx-auto py-3 px-4">
                        <h1 class="m-0">
                            End-of-summer
                        </h1>
                        <h1 class="m-0">
                            style at its best.
                        </h1>
                        <div class="bannerBtns d-flex align-items-center">
                            <a href="#" class="btn btn-banner">Women</a>
                            <div class="vl"></div>
                            <a href="#" class="btn btn-banner">Men</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BANNER SECTION END -->
        <!-- NEW ARRIVAL SECTION BEGIN -->
        <section class="new-arrival-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="new-arrival-bar">
                            <ul>
                                <li>New Arrivals</li>
                                <li><span>|</span></li>
                                <li class="save-col">SAVE UPTO 65% OFF</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">


                    {{ $Products([
                        'limit' => 0,
                        'col' => 3,
                        'template' => 'product-grid-view',
                    ]) }}



                    {{--        @foreach ($product as $product) --}}
                    {{--            <div class="col-md-3 col-sm-6 col-12 padd-rgt"> --}}
                    {{--                <div class="light-border"> --}}
                    {{--                    <div id="featured_img"> --}}

                    {{--                        @if ($product->image != null) --}}
                    {{--                            @php $image = '/'.$product->image @endphp --}}
                    {{--                        @else --}}
                    {{--                            @php $image = 'galleryimage.png' @endphp --}}
                    {{--                        @endif --}}
                    {{--                        <img style="" src="{{asset('images/media'.'/'.$image)}}" height="200px" width="260px"> --}}
                    {{--                        <img id="img" src="{{asset('frontend/ecommerce/images/jack1.jpg')}}" alt="image"> --}}
                    {{--                    </div> --}}
                    {{--                    <div id="thumb_img" class="cf"> --}}
                    {{--                        <h6> --}}
                    {{--                  <span class="active-cls"> --}}
                    {{--                    <div class="color" style="background-color: #222222" data-hex="222222"></div> --}}
                    {{--                  </span> --}}
                    {{--                        </h6> --}}
                    {{--                        <h6> --}}
                    {{--                  <span> --}}
                    {{--                    <div class="color" style="background-color: #66aabc" data-hex="66aabc"></div> --}}
                    {{--                  </span> --}}
                    {{--                        </h6> --}}
                    {{--                        <h6> --}}
                    {{--                  <span> --}}
                    {{--                    <div class="color" style="background-color: #555555" data-hex="555555"></div> --}}
                    {{--                  </span> --}}
                    {{--                        </h6> --}}
                    {{--                        <h6> --}}
                    {{--                  <span> --}}
                    {{--                    <div class="color" style="background-color: #b9b8b5" data-hex="b9b8b5"></div> --}}
                    {{--                  </span> --}}
                    {{--                        </h6> --}}
                    {{--                        <h6> --}}
                    {{--                  <span> --}}
                    {{--                    <div class="color" style="background-color: #36454f" data-hex="36454f"></div> --}}
                    {{--                  </span> --}}
                    {{--                        </h6> --}}
                    {{--                        <h6> --}}
                    {{--                  <span> --}}
                    {{--                    <div class="color" style="background-color: #ffb7a5" data-hex="ffb7a5"></div> --}}
                    {{--                  </span> --}}
                    {{--                        </h6> --}}
                    {{--                        <div class="more-colors"><a href="javascriptvoid:(0)">+4</a></div> --}}
                    {{--                    </div> --}}
                    {{--                    <h4 class="jacket-heading">{{$product->title}}</h4> --}}
                    {{--                    <div class="stars-icon"> --}}
                    {{--                        <ul> --}}
                    {{--                            <li><i class="fa fa-star" aria-hidden="true"></i></li> --}}
                    {{--                            <li><i class="fa fa-star" aria-hidden="true"></i></li> --}}
                    {{--                            <li><i class="fa fa-star" aria-hidden="true"></i></li> --}}
                    {{--                            <li><i class="fa fa-star" aria-hidden="true"></i></li> --}}
                    {{--                            <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li> --}}
                    {{--                            <li class="number-spacing">{992}</li> --}}
                    {{--                        </ul> --}}
                    {{--                    </div> --}}
                    {{--                    <p class="amount-text"><small>$</small><span>{{$product->discounted_price}}.</span><small></small> <span class="cut-price">{{$product->compare_price}}</span></p> --}}
                    {{--                    <h6 class="promo-text">35% OFF-Save $40.00</h6> --}}
                    {{--                    <p class="free-shipping-text"><a href="{{url('single-product',$product->slug)}}"> Free Shipping </a></p> --}}
                    {{--                </div> --}}
                    {{--            </div> --}}


                    {{--            @endforeach --}}

                </div>
            </div>
        </section>
        <!-- NEW ARRIVAL SECTION END -->
        <!-- WORKWEAR SECTION BEGIN -->
        <section class="new-arrival-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="new-arrival-bar">
                            <ul class="workwear-apparel">
                                <li>Workwear & Apparel</li>
                                <li><span>|</span></li>
                                <li class="save-col">SAVE UPTO 65% OFF</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 padd-rgt">
                        <div class="light-border">
                            <div id="featured_img">
                                <img id="img" src="{{ asset('frontend/ecommerce/images/jack5.jpg') }}"
                                    alt="image">
                            </div>
                            <div id="thumb_img" class="cf">
                                <h6>
                                    <span class="active-cls">
                                        <div class="color" style="background-color: #222222" data-hex="222222"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #66aabc" data-hex="66aabc"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #555555" data-hex="555555"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #b9b8b5" data-hex="b9b8b5"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #36454f" data-hex="36454f"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #ffb7a5" data-hex="ffb7a5"></div>
                                    </span>
                                </h6>
                                <div class="more-colors"><a href="javascriptvoid:(0)">+4</a></div>
                            </div>
                            <h4 class="jacket-heading">Men's Smooth Lamb Faux Leather Unfilled Bomb...</h4>
                            <div class="stars-icon">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                    <li class="number-spacing">992</li>
                                </ul>
                            </div>
                            <p class="amount-text"><small>$</small><span>45.</span><small>99</small> <span
                                    class="cut-price">$57.99</span></p>
                            <h6 class="promo-text">35% OFF-Save $40.00</h6>
                            <p class="free-shipping-text">Free Shipping</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 padd-rgt">
                        <div class="light-border">
                            <div id="featured_img">
                                <img id="img" src="{{ asset('frontend/ecommerce/images/jack6.jpg') }}"
                                    alt="image">
                            </div>
                            <div id="thumb_img" class="cf">
                                <h6>
                                    <span class="active-cls">
                                        <div class="color" style="background-color: #222222" data-hex="222222"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #66aabc" data-hex="66aabc"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #555555" data-hex="555555"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #b9b8b5" data-hex="b9b8b5"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #36454f" data-hex="36454f"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #ffb7a5" data-hex="ffb7a5"></div>
                                    </span>
                                </h6>
                                <div class="more-colors"><a href="javascriptvoid:(0)">+4</a></div>
                            </div>
                            <h4 class="jacket-heading">Men's Smooth Lamb Faux Leather Unfilled Bomb...</h4>
                            <div class="stars-icon">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                    <li class="number-spacing">992</li>
                                </ul>
                            </div>
                            <p class="amount-text"><small>$</small><span>45.</span><small>99</small> <span
                                    class="cut-price">$57.99</span></p>
                            <h6 class="promo-text">35% OFF-Save $40.00</h6>
                            <p class="free-shipping-text">Free Shipping</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 padd-rgt">
                        <div class="light-border">
                            <div id="featured_img">
                                <img id="img" src="{{ asset('frontend/ecommerce/images/jack7.jpg') }}"
                                    alt="image">
                            </div>
                            <div id="thumb_img" class="cf">
                                <h6>
                                    <span class="active-cls">
                                        <div class="color" style="background-color: #222222" data-hex="222222"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #66aabc" data-hex="66aabc"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #555555" data-hex="555555"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #b9b8b5" data-hex="b9b8b5"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #36454f" data-hex="36454f"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #ffb7a5" data-hex="ffb7a5"></div>
                                    </span>
                                </h6>
                                <div class="more-colors"><a href="javascriptvoid:(0)">+4</a></div>
                            </div>
                            <h4 class="jacket-heading">Men's Smooth Lamb Faux Leather Unfilled Bomb...</h4>
                            <div class="stars-icon">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                    <li class="number-spacing">992</li>
                                </ul>
                            </div>
                            <p class="amount-text"><small>$</small><span>45.</span><small>99</small> <span
                                    class="cut-price">$57.99</span></p>
                            <h6 class="promo-text">35% OFF-Save $40.00</h6>
                            <p class="free-shipping-text">Free Shipping</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 padd-rgt">
                        <div class="light-border">
                            <div id="featured_img">
                                <img id="img" src="{{ asset('frontend/ecommerce/images/jack8.jpg') }}"
                                    alt="image">
                            </div>
                            <div id="thumb_img" class="cf">
                                <h6>
                                    <span class="active-cls">
                                        <div class="color" style="background-color: #222222" data-hex="222222"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #66aabc" data-hex="66aabc"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #555555" data-hex="555555"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #b9b8b5" data-hex="b9b8b5"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #36454f" data-hex="36454f"></div>
                                    </span>
                                </h6>
                                <h6>
                                    <span>
                                        <div class="color" style="background-color: #ffb7a5" data-hex="ffb7a5"></div>
                                    </span>
                                </h6>
                                <div class="more-colors"><a href="javascriptvoid:(0)">+4</a></div>
                            </div>
                            <h4 class="jacket-heading">Men's Smooth Lamb Faux Leather Unfilled Bomb...</h4>
                            <div class="stars-icon">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                    <li class="number-spacing">992</li>
                                </ul>
                            </div>
                            <p class="amount-text"><small>$</small><span>45.</span><small>99</small> <span
                                    class="cut-price">$57.99</span></p>
                            <h6 class="promo-text">35% OFF-Save $40.00</h6>
                            <p class="free-shipping-text">Free Shipping</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- WORKWEAR SECTION END -->
        <!-- VIDEO SECTION BEGIN -->
        <section class="video-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12">
                        <img src="{{ asset('frontend/ecommerce/images/des1.jpg') }}" align="image" class="img-fluid">
                    </div>
                    <div class="col-md-8 col-sm-8 col-12">
                        <div class="video-player-content">
                            <video width="100%" controls>
                                <source src="images/data-inner-video.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- VIDEO SECTION END -->
        <!-- REAL JACKET SECTION BEGIN -->
        <section class="real-jacket-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="real-jacket-content">
                            <h4>Real Leather Jackets, Coats and Blazers | Formal Suit and Tuxedos for Men</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- REAL JACKET SECTION END -->
        <!-- SUBSCRIBE SECTION BEGIN -->
        <section class="subscribe-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="subscribe-bar">
                            <div class="subscribe-content">
                                <h6>Sign up for email</h6>
                            </div>
                            <div class="email-content">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <div class="subscribe-btn">
                                    <button type="button" class="btn btn-primary">SUBSCRIBE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="connect-content">
                            <h6>Connect with us</h6>
                            <div class="connect-listing">
                                <ul>
                                    <li><a href="javascriptvoid:(0)" class="col1"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="javascriptvoid:(0)" class="col2"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="javascriptvoid:(0)" class="col3"><i class="fa fa-pinterest-p"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="javascriptvoid:(0)" class="col4"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="javascriptvoid:(0)" class="col5"><i class="fa fa-youtube"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SUBSCRIBE SECTION END -->
    @endsection
@endif
