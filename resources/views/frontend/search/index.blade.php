@extends('frontend.layouts.master')
@section('title')
    Search Result - ONTHE VOUCH
@endsection
@section('description')
    {{--Meta Description here --}}
@endsection
@section('keywords')
    {{--   Meta Keywords here --}}
@endsection
@section('content')
    <div class="container sec-2">
        <div class="row my-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row  w-100 mx-auto under p-3">
                    {{$Snippet('advanced-filter')}}
                    <div class="col-12 my-3">
                        <p class="text-uppercase mb-0 fs-3 text-purp fw-sm-bold">
                            Search Result For  : {{$_GET['coupon']}}
                        </p>
                    </div>

                    <div class="col-12 my-3">
                        <div class="row aj-data">


                        @if($coupon)
                        @foreach($coupon as $coupons)
                            @include('frontend/snippets/coupon-grid')
                            @include('frontend/snippets/coupon-list')
                        @endforeach
                    @else
                        <div class="col-lg-12 col-md-6 col-sm-12 p-5">
                            <h3 class="text-center">
                                No Coupon Found
                            </h3>
                        </div>
                    @endif
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="col-12 mx-auto text-center my-3">--}}
{{--                <button class="custom_btn">VIEW ALL</button>--}}
{{--            </div>--}}
        </div>
    </div>

@endsection
