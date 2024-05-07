@extends('frontend.layouts.master')
@section('title')
    Blog - {{config('app.name')}}
@endsection
@section('description')
    {{--Meta Description here --}}
@endsection
@section('keywords')
    {{--   Meta Keywords here --}}
@endsection
@section('content')


    <div class="container blog_sec_1">
        <div class="content text-center row ">
            <p class="text-light fw-sm-bold text-uppercase fs-2">
                get the best deals online first:
            </p>
            <style>
                .fs-12 {
                    font-size: 12px;
                }

                .w-60 {
                    width: 60%;
                }
            </style>
            <p class="text-light fw-normal text-uppercase fs-12">
                join the onthe vouch deals newsletter for the best deals on the web
            </p>
            <div class="col-md-7 col-12 mx-auto  subscribe newsletter">


                <div class="row form p-0 ">
                    <div class="col-lg-9 col-sm-12 p-0">
                        <input type="text" placeholder="Enter Your Email Address"
                               class="w-100 h-100 px-4 py-3 form-control shadow-none border-0 rounded-0">
                    </div>
                    <div class="col-lg-3 col-sm-12 p-0">
                        <button class="btn blog_btn w-100 h-100 newsletter-subscribe">GET GREAT DEALS</button>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="error"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container main-blog">
<div class="row py-5">
    @if($blogs != null)
    @foreach($blogs as $blog)
{{--        @dd($blog['id'])--}}
        @include('frontend/snippets/blog-list')
        @include('frontend/snippets/blog-grid')

    @endforeach
    @else
        <h5 class="py-5"> No Blogs Found</h5>
    @endif
</div>

    </div>

@endsection
