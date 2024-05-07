
@extends('frontend.layouts.master')
@section('title')
    Contact - {{config('app.name')}}
@endsection
@section('description')
    {{$seo->meta_description}}
@endsection
@section('keywords')
    {{$seo->meta_keywords}}
    {{--   Meta Keywords here --}}
@endsection
@section('content')
    <div class="container pd_comment_sec mb-3 bg-signature d-flex justify-content-center">
        <div class="row container second-row">
            <div class="col-12  w-100 py-3 text-light fs-6">Onthevouch <i
                        class="fa-solid fa-angle-right mx-2"></i> V Show <i class="fa-solid fa-gift mx-3"></i> Share Great
                Deals & Products And Save Together.</div>
        </div>
    </div>
    <div class="main_videos container my-4">
        <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-12 my-2 card_pp">
                        <div class="card p-4">
                            <video class="" width="100%" controls>
                                <source src=" {{asset('media/videos/'.$video->video)}}" type="video/mp4">
                                <source src="mov_bbb.ogg" type="video/ogg">
                                Your browser does not support HTML video.
                            </video>
                            <div class="row w-100 mx-auto">
                                <div class="col-6 p-2">
                                    <div class="one d-flex me-2 align-items-center">
                                        <img style="filter: invert(1);" src="{{asset('frontend/img/Icon awesome-eye.png')}}" class="w-16" alt="eye">
                                        <p class="mb-0 mx-1 " style="font-size: 13px;">
                                            29.5k
                                        </p>
                                    </div>

                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    {{$LikeWidget('video',$video->id)}}
                                </div>

                            </div>

                            <div class="row w-100 mx-auto">
                                <div class="col-6 p-2">
                                    <div class="custom-dropdown-area UserProfile">
                                        <div class="User-avtar d-flex align-items-center">
                                            <img style="box-shadow: none; filter: unset" src="https://eliteblue.net/Clients/viys/coupon/public/frontend/img/user.png">
                                            <h6 class="user_name px-3 mb-0">
                                                {{$video['user']->name}}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
<h4 class="mt-2">{{$video->title}}</h4>



                            @if($ThemeSettings('option-coupon-comments','on'))
                                @auth
                                    <section>
                                        <div class="pd_comment_sec my-4 bg-signature d-flex justify-content-center">
                                            <div class="row container">
                                                <div class="col-12  w-100 py-3 text-light fs-5">COMMENTS</div>
                                            </div>
                                        </div>
                                        {{$CommentBox('video',$video->id)}}
                                        {{$CommentList('video',$video->id)}}
                                    </section>
                                @endauth
                            @endif
                            @guest
                                <div class="container login-container my-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="shadow p-3 px-4 d-flex justify-content-between">
                                                <div class="row w-100">
                                                    <div
                                                            class="col-lg-8 col-md-8 col-12 left-content d-flex justify-content-center align-items-center">
                                                        <div class="img">
                                                            <img src="{{asset('frontend/img/Group 215.png')}}" alt="">
                                                        </div>
                                                        <p class="fs-6 mb-0 mx-4">
                                                            <a href="{{url('register')}}">Log in</a> or
                                                            <a href="{{url('login')}}">Sign up</a> for a ONEVOUCH account to post comment.
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
                                                                <a  href="{{url('register')}}"
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
                        </div>
                    </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-2 card_pp">
<div class="card py-4">

</div>
            </div>
        </div>
    </div>

    <style>
        .fs-14 {
            font-size: 14px;
        }
    </style>
@endsection


