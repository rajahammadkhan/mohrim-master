@extends('frontend.layouts.master')
@section('title')
    {{$blog->title}} - {{config('app.name')}}
@endsection
@section('description')
    {{--Meta Description here --}}
@endsection
@section('keywords')
    {{--   Meta Keywords here --}}
@endsection
@section('content')



    <div class="container main-blog">
            <div class="row my-5 blog-list-view">
                <div class="col-md-12">
                    <h2 class=" fs-2 main-heading fw-sm-bold text-start text-truncate">
                        {{$blog->title}}
                    </h2>
                    <p class="fs-6 text-muted fw-sm-bold">

                        By Onthe Vouch Last Updated On {{date('M, d-Y', strtotime($blog->updated_at))}}
                    </p>
                    <p class="fs-6 text-signature fw-sm-bold">
                        {{count($comments)}} Comments
                    </p>
                    <div class="fs-6 fw-sm- text-start para long-description-box">
                        {!! $blog->long_description !!}
                    </div>
                </div>

                </div>


            </div>
    </div>



    @if($ThemeSettings('option-blog-comments','on'))
        @auth
            <section>
                <div class="pd_comment_sec my-4 bg-signature d-flex justify-content-center">
                    <div class="row container">
                        <div class="col-12 w-100 py-3 text-light fs-5">COMMENTS</div>
                    </div>
                </div>
                {{$CommentBox('blog',$blog->id)}}
                {{$CommentList('blog',$blog->id)}}
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
@endsection
<style>
    .long-description-box img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }
    .long-description-box a {
        color: #000000 !important;
    }
</style>
