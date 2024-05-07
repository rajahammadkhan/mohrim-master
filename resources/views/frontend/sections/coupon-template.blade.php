{{--@dd($coupon->title)--}}
<div class="sec_product container my-4">
    <div class="row">
        <div class="col-lg-5 col-md-4 col-sm-12 mb-4">
            <!-- <img src="assets/img/Image 187.png" alt="" class="w-100 px-4"> -->

@if($media->isNOtEmpty())
            <div class="slider sliderx slider-products" data-aos="fade-up">
                @foreach($media as $image)
                <div class="d-flex justify-content-center align-items-center w-100">
                    <img class="w-75" data-fancybox="group" src="{{asset('images/media/'.$image->image)}}" alt="{{$coupon->slug}}">
                </div>
                @endforeach
            </div>

            <div class="slider foot_sliderz slider-nav mt-3" data-aos="fade-up">
                @foreach($media as $image)
                <div><img class="w-100" src="{{asset('images/media/'.$image->image)}}" alt="{{$coupon->slug}}"></div>
                @endforeach
            </div>



        @else
            <img src="{{asset('images/media/galleryimage.png')}}" alt="{{$coupon->slug}}" class="w-100 px-4">

            @endif
        </div>

{{--        <div class="col-lg-4 col-md-4 col-sm-12 ">--}}
{{--            <img src="{{asset('images/media/'.$media[0]->image)}}" alt="" class="w-100 px-4">--}}
{{--        </div>--}}
        <div class="col-lg-7 col-md-8 col-sm-12">
            <p class="expiry my-2 fw-normal text-muted fs-6">
                Listing Expires in
                <span class="text-danger fw-bold">

                     @php
                         $start_date = date('Y-m-d');
                         $expiry_date = date('Y-m-d' ,strtotime($coupon->expiry_date));
                         $diff =Carbon\Carbon::parse($start_date)->diffInDays($expiry_date);
                     @endphp
                    {{$diff}} Days



                            </span>
            </p>
            <p class=" fs-2 fw-sm-bold">
                {{$coupon->title}}
            </p>

            <div class="row">
                <div class="col-md-12 pd-foot">
                    <div class="sec d-md-flex">
                        <div class="pe-2 py-2 my-2 fw-normal text-muted"><img width="30px" src="{{$country}}" alt="{{$country}}"> {{$category->title}}</div>
                        <div class="shadow mx-2 my-2 px-2 py-2 text-muted rounded-pill fw-normal">{{$coupon->fullfilled == 1 ? 'Fullfilled By ' : '' }} {{$store->title}}</div>
                    </div>
                </div>
                    <div class="col-12 pd-foot">
                        <div class="pd-content pt-3">
                        <p class="price mb-0">
                                <span class="old_price fs-5 pe-2 fw-bold text-muted">
                                    <strike>
                                                        ${{$coupon->compare_price}}

                                    </strike>
                                </span>
                            <span class="fs-3 fw-bold text-danger">
                               $ {{$coupon->regular_price}}
                                </span>
                            <span class="badge bg-signature rounded-0 px-3 {{$coupon->discount == null ? 'd-none' : ''}}">
                             -{{$coupon->discount}}%
                                </span>
                        </p>
                    </div>
                    </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="shadow px-4 py-2 text-purp rounded-pill fw-sm-bold">{{$coupon->discount}}% off</div>--}}
{{--                </div>--}}
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-md-8 col-12 d-flex align-items-center">
                    @if($coupon->coupon_type == 'coupon')
                        <a  href="{{url('get-code',base64_encode($coupon->id))}}" class="rounded-0 bg-signature py-3 w-50 d-block text-center fw-sm-bold text-light fs-5 border-0" data-toggle="tooltip" data-placement="bottom" title="Vouch It">GET
                            COUPON</a>
                    @else
                        <a  href="{{$coupon->affiliate_url}}" class="rounded-0 bg-signature py-3 w-50 d-block text-center fw-sm-bold text-light fs-5 border-0" data-toggle="tooltip" data-placement="bottom" title="Vouch It">GET
                            Deal</a>
                    @endif
{{$Snippet('social-sharing')}}

{{--                        <div class="social_profile ms-3 my-0">--}}
{{--                            <ul>--}}
{{--                                <li><a target="_blank" href="https://www.instagram.com//?https://eliteblue.net/Clients/viys/coupon/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a target="_blank" href="https://api.whatsapp.com/?{{url()->current()}}"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                </div>

                <div class="col-md-4 col-12 d-inline-flex justify-content-end">
                             {{$WishList('coupon',$coupon->id)}}
                                {{$LikeWidget('coupon',$coupon->id)}}

                </div>
            </div>
        <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p class="fs-6 text-muted fw-normal">
                        The descriptions and pictures of products on <span class="fw-bold text-capitalize">{{config('app.name')}}</span> are for reference only. Please fully view the product listing on
                        {{$store->title}} before purchasing.
                    </p>
                    <hr>
                    <p class="fs-6 mb-0 fw-bold">
                        About the Product
                    </p>
                    <div class="fs-6 text-muted fw-normal long-description my-3">
                        {!! $coupon->long_description !!}
                    </div>
                    <div class="sec d-flex">
                        <a class="readmore shadow mb-3 px-5 fw-sm-bold py-2 text-dark rounded-pill">
                            Read More
                        </a>
                    </div>
                </div>
            </div>



            </div>
        </div>

    </div>
</div>


    @if($ThemeSettings('option-coupon-comments','on'))
        @auth
            <section>
                <div class="pd_comment_sec my-4 bg-signature d-flex justify-content-center">
                    <div class="row container">
                        <div class="col-12  w-100 py-3 text-light fs-5">COMMENTS</div>
                    </div>
                </div>
                <div class="p-md-5 p-2">
                    {{$CommentBox('coupon',$coupon->id)}}
                    {{$CommentList('coupon',$coupon->id)}}
                </div>

            </section>
        @endauth
    @endif
    @guest
        <div class="container login-container my-3">
            <div class="row">
                <div class="col-12">
                    <div class="shadow p-3 px-4 d-flex justify-content-center">
                        <div class="row w-100">
                            <div class="col-lg-2 col-md-2 col-12 left-content d-flex justify-content-center align-items-center">
                                <div class="img">
                                    <img style="height:80px;width: 120px;object-fit: contain;" src="{{asset('/frontend/img/brandlogo.png')}}" alt="{{config('app.name')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 left-content d-flex justify-content-center align-items-center">

                                <p class="fs-6 mb-0 mx-4">
                                    <a href="{{url('login')}}">Log in</a> or
                                    <a href="{{url('register')}}">Sign up</a> for a <span class="text-uppercase">{{config('app.name')}}</span> account to post comment.
                                </p>
                            </div>
                            <div
                                    class="right-content col-lg-4 col-md-4 col-12 d-flex  justify-content-center align-items-center">
                                <div class="btns d-flex">
                                    <div class="login mx-1">
                                        <a href="{{url('login')}}"
                                           class="login_btn btn shadow-none border-0 outline-none px-3 py-2 rounded-pill">Log
                                            in</a>
                                    </div>
                                    <div class="signup">
                                        <a href="{{url('register')}}"
                                           class="signup_btn btn shadow-none border-0 outline-none px-3 py-2 rounded-pill">Sign
                                            up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

<style>
    .long-description{
        display: -webkit-box;
        /* max-width: 200px; */
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .long-description.show{
        display: block ;
    }
    .long-description a {
        color: #777 !important;
    }
</style>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('.readmore').on('click',function(){

            $('.long-description').toggleClass('show');

if($('.long-description').hasClass('show')){
    console.log($('.long-description').hasClass('show'));
    $('.readmore').text('Read Less');
}else{
    $('.readmore').text('Read More');
}

        // var text = $(this).text();
        // $(this).text(text == "More" ? "Less" : "More");
        })
</script>






