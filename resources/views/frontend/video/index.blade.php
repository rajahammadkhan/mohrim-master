@extends('frontend.layouts.master')
@section('title')
    Contact - {{config('app.name')}}
@endsection
@section('description')
    {{--Meta Description here --}}
@endsection
@section('keywords')
    {{--   Meta Keywords here --}}
@endsection
@section('content')
    <div class="container pd_comment_sec mb-3 bg-signature d-flex justify-content-center">
        <div class="row container second-row">
            <div class="col-12 w-100 py-3 text-light fs-6">Onthevouch <i
                        class="fa-solid fa-angle-right mx-2"></i> V Show <i class="fa-solid fa-gift mx-3"></i> Share Great
                Deals & Products And Save Together.</div>
        </div>
    </div>
    <div class="main_videos container my-4">
        <div class="row">
            @if(count($data) != 0 )
            @foreach($data as  $row)
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 my-2 card_pp">
                <div class="image-container mx-1">
                    <img src="{{asset('media/videos/thumbnail/'.$row->thumbnail)}}" class="w-100" />
                    <div class="after">
                        <div class="vd_controls px-2 d-flex justify-content-between align-items-center">
{{--                            <div class="left d-flex align-items-baseline">--}}
{{--                                <div class="one d-flex me-2 align-items-center">--}}
{{--                                    <img src="{{asset('frontend/img/Icon awesome-eye.png')}}" class="w-16" alt="eye">--}}
{{--                                    <p class="mb-0 mx-1 text-white" style="font-size: 11px;">--}}
{{--                                        29.5k--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
                            <div class="rights">
                                <div class="two d-flex ms-1 align-items-center">
                                    <img src="{{asset('frontend/img/Path 81.png')}}"
                                         style="width: 16px; filter: invert(1) brightness(1.5);" alt="eye">
                                    <p class="mb-0 mx-1 text-white" style="font-size: 11px;">
                                        12
                                    </p>
                                </div>
{{--                                <div class="bg-light d-flex justify-content-center align-items-center text-dark"--}}
{{--                                     style="padding: 4px; width: 50px; height: 15px;">--}}
{{--                                    0:15</div>--}}
                            </div>
                        </div>

                    </div>
                    <div class="play">
                        <a href="{{route('video.show',$row->slug)}}">
                        <img src="{{asset('frontend/img/Icon awesome-play-circle.png')}}" class="w-75" alt="">
                        </a>
                    </div>
                </div>

                <div class="main vd shadow mx-1">
                    <div class="content row p-2 py-3">
                        <div class="col-3 pe-0 my-auto">
                            <img src="{{asset('frontend/img/Group 215.png')}}" class="w-75" alt="">
                        </div>
                        <div class="col-9 d-flex flex-column justify-content-between">

                            <p class="fs-14 fw-bold mb-0">

                                {{$row->title}}
                            </p>
                            <div class="vd_foot d-flex justify-content-between">
                                <p class="mb-0" style="font-size: 10px;">
                                    {{$row['user']->name}}
                                </p>
                                <p class="mb-0" style="font-size: 10px;">
                                    {{$row->updated_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
               <h5 class="py-5"> No Video Found</h5>
                @endif
        </div>
    </div>

    <style>
        .fs-14 {
            font-size: 14px;
        }
    </style>
@endsection


