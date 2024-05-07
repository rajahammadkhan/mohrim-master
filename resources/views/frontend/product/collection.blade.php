@extends('frontend.layouts.master')
@section('content')
{{--    <link rel="stylesheet" type="text/css" href="{{asset('frontend/ecommerce/css/slick.css')}}"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('frontend/ecommerce/css/slick-theme.css')}}"/>--}}
<!-- SLIDER SECTION BEGIN -->
<section class="img-slider-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="img-slic-slider">
                    <div class="slider slider-for m-0">
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SLIDER SECTION END -->
<!-- SIDEBAR SECTION BEGIN -->
<section class="sidebar-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-12">
                <div class="wrapper">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        CATEGORY
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul class="mens-stuff">
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Augusta (4)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Badger (2)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Code V (3)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District (2)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District Made (1)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Port Authority (1)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Tri-Mountain (1)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        BRAND
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <ul class="mens-stuff">
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Augusta (4)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Badger (2)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Code V (3)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District (2)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District Made (1)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Port Authority (1)</a></li>
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Tri-Mountain (1)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @foreach($variations as $variation)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFor{{$variation->attribute_name}}" aria-expanded="false" aria-controls="collapseFour">
                                        {{$variation->attribute_name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFor{{$variation->attribute_name}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <ul class="mens-stuff">
                                        @foreach(json_decode($variation->variations) as $VariationOptions)
                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> {{$VariationOptions}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
{{--                        <div class="panel panel-default">--}}
{{--                            <div class="panel-heading" role="tab" id="headingFive">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">--}}
{{--                                        SIZE--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <ul class="mens-stuff">--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Augusta (4)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Badger (2)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Code V (3)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District (2)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District Made (1)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Port Authority (1)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Tri-Mountain (1)</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="panel panel-default">--}}
{{--                            <div class="panel-heading" role="tab" id="headingSix">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">--}}
{{--                                        PRICE--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">--}}
{{--                                <div class="panel-body">--}}
{{--                                    <ul class="mens-stuff">--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Augusta (4)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Badger (2)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Code V (3)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District (2)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District Made (1)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Port Authority (1)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Tri-Mountain (1)</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-12">
                <div class="black-jacket">
                    <h4>BLACK LEATHER JACKET</h4>
                    <span class="bottom-line"></span>
                    <p>Black is a classic color. The significant advantage of having a leather jacket in black is that it goes with everything. You can wear the jacket with every fashion, style and color.</p>
                </div>
                <div class="row sort-border">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="sort-opt-flex">
                            <div class="sort-opt">
                                <p>Sort by:</p>
                            </div>
                            <div class="select-opt">
                                <select class="form-control">
                                    <option>Most Popular</option>
                                    <option>Most Popular</option>
                                    <option>Most Popular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="windows-list">
                            <ul>
                                <li><a href="javascriptvoid:(0)"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
                                <li><a href="javascriptvoid:(0)"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    @include('frontend/snippets/product-grid-view')
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SIDEBAR SECTION END -->
<!-- CUSTOMER REVIEWS SECTION BEGIN -->
<section class="customer-reviews-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="customer-content">
                    <h4>FJACKETS LEGIT CUSTOMERS</h4>
                </div>
                <div class="customer-reviews-slider">
                    <div class="slider responsive-review">
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <h5>GO FOR IT!</h5>
                                    <p>I was having doughts about the quality though so i asked one of my jacket, i have bought it's exactly what i was looking for.</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        <img src="{{asset('frontend/ecommerce/images/cust-rev.jpg')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cust-info">
                                        <h6>Jessie Liam</h6>
                                        <p>Grande Rue, France</p>
                                        <ul class="stars-box">
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="javascriptvoid:(0)"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CUSTOMER REVIEWS SECTION END -->
<!-- JACKETS FAMILY SECTION BEGIN -->
<section class="jackets-family-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="jackets-family-content">
                    <h4>#FJACKETS FAMILY</h4>
                    <a href="javascriptvoid:(0)">View Gallery <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="family-slider">
                    <div class="slider responsive-family">
                        @foreach($gallery as $galleries)
                        <div>
                            <a href="{{asset('images/media/'.$galleries->image)}}" data-fancybox="gallery">
                                <img src="{{asset('images/media/'.$galleries->image)}}" alt="image" class="img-fluid">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- JACKETS FAMILY SECTION END -->
<!-- REAL JACKET SECTION BEGIN -->
<section class="real-jacket-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="real-jacket-content">
                    <h4>Real Leather Jackets, Coats and Blazers | Formal Suit and Tuxedos for Men</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
                            <li><a href="javascriptvoid:(0)" class="col1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="javascriptvoid:(0)" class="col2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="javascriptvoid:(0)" class="col3"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="javascriptvoid:(0)" class="col4"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="javascriptvoid:(0)" class="col5"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SUBSCRIBE SECTION END -->
<script>
    $('.slider-for').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        // asNavFor: '.slider-for',
        // dots: true,
        // infinite:true,
        focusOnSelect: true
    });



            $('.responsive-family').slick({
                dots: true,
                infinite: true,
                arrows: false,
                autoplay: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });




            $('.responsive-review').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
</script>
@endsection

{{--    <script--}}
{{--            src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
{{--            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="--}}
{{--            crossorigin="anonymous"--}}
{{--    ></script>--}}
{{--    <script type="text/javascript" src="{{asset('frontend/ecommerce/js/slick.js')}}"></script>--}}

{{--    <script>--}}
{{--        $('.responsive-img').slick({--}}
{{--            dots: false,--}}
{{--            infinite: true,--}}
{{--            arrows: false,--}}
{{--            autoplay: true,--}}
{{--            speed: 300,--}}
{{--            slidesToShow: 7,--}}
{{--            slidesToScroll: 1,--}}
{{--            responsive: [--}}
{{--                {--}}
{{--                    breakpoint: 1024,--}}
{{--                    settings: {--}}
{{--                        slidesToShow: 2,--}}
{{--                        slidesToScroll: 1,--}}
{{--                        infinite: true,--}}
{{--                        dots: true--}}
{{--                    }--}}
{{--                },--}}
{{--                {--}}
{{--                    breakpoint: 600,--}}
{{--                    settings: {--}}
{{--                        slidesToShow: 2,--}}
{{--                        slidesToScroll: 1--}}
{{--                    }--}}
{{--                },--}}
{{--                {--}}
{{--                    breakpoint: 480,--}}
{{--                    settings: {--}}
{{--                        slidesToShow: 1,--}}
{{--                        slidesToScroll: 1--}}
{{--                    }--}}
{{--                }--}}
{{--            ]--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('.responsive-review').slick({--}}
{{--            dots: false,--}}
{{--            infinite: true,--}}
{{--            arrows: false,--}}
{{--            autoplay: true,--}}
{{--            speed: 300,--}}
{{--            slidesToShow: 5,--}}
{{--            slidesToScroll: 1,--}}
{{--            responsive: [--}}
{{--                {--}}
{{--                    breakpoint: 1024,--}}
{{--                    settings: {--}}
{{--                        slidesToShow: 2,--}}
{{--                        slidesToScroll: 1,--}}
{{--                        infinite: true,--}}
{{--                        dots: true--}}
{{--                    }--}}
{{--                },--}}
{{--                {--}}
{{--                    breakpoint: 600,--}}
{{--                    settings: {--}}
{{--                        slidesToShow: 2,--}}
{{--                        slidesToScroll: 1--}}
{{--                    }--}}
{{--                },--}}
{{--                {--}}
{{--                    breakpoint: 480,--}}
{{--                    settings: {--}}
{{--                        slidesToShow: 1,--}}
{{--                        slidesToScroll: 1--}}
{{--                    }--}}
{{--                }--}}
{{--            ]--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        // $('.responsive-family').slick({--}}
{{--        //     dots: true,--}}
{{--        //     infinite: true,--}}
{{--        //     arrows: false,--}}
{{--        //     autoplay: true,--}}
{{--        //     speed: 300,--}}
{{--        //     slidesToShow: 5,--}}
{{--        //     slidesToScroll: 1,--}}
{{--        //     responsive: [--}}
{{--        //         {--}}
{{--        //             breakpoint: 1024,--}}
{{--        //             settings: {--}}
{{--        //                 slidesToShow: 3,--}}
{{--        //                 slidesToScroll: 1,--}}
{{--        //                 infinite: true,--}}
{{--        //                 dots: true--}}
{{--        //             }--}}
{{--        //         },--}}
{{--        //         {--}}
{{--        //             breakpoint: 600,--}}
{{--        //             settings: {--}}
{{--        //                 slidesToShow: 2,--}}
{{--        //                 slidesToScroll: 1--}}
{{--        //             }--}}
{{--        //         },--}}
{{--        //         {--}}
{{--        //             breakpoint: 480,--}}
{{--        //             settings: {--}}
{{--        //                 slidesToShow: 1,--}}
{{--        //                 slidesToScroll: 1--}}
{{--        //             }--}}
{{--        //         }--}}
{{--        //     ]--}}
{{--        // });--}}
{{--    </script>--}}
