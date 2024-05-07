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



    <div class="container-fluid main-blog">
        <div class="row mb-5 blog-list-view">
            <div class="col-md-12 position-relative p-0" style="height: 220px;">
                @if($media == null)
                @else
                    <img class="w-100 h-100" style="object-fit: cover" src="{{asset('images/pages/'.$media->image)}}" alt="">
                @endif
                <div class="container">
                    <div class="overlay-title text-uppercase bg-signature">
                        <h3>{{$blog->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5 blog-list-view">
            <div class="col-md-12">
                <h2 class=" fs-2 main-heading fw-sm-bold text-start text-truncate">

                </h2>
                <p class="fs-6 text-muted fw-sm-bold">

                {{--                    By Onthe Vouch Last Updated On {{date('M, d-Y', strtotime($blog->updated_at))}}--}}
                {{--                </p>--}}
                {{--                <p class="fs-6 text-signature fw-sm-bold">--}}
                {{--                    {{count($comments)}} Comments--}}
                {{--                </p>--}}
                <div class="fs-6 fw-sm- text-start para long-description-box">
                    {!! $blog->description !!}
                </div>
            </div>

        </div>


    </div>
    </div>



@endsection
<style>
    .long-description-box img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }
    .overlay-title{
        @if($media == null)
        background: #38c4ca;

        @else
        background: #000000c4;
        @endif
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
