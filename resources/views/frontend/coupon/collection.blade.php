@extends('frontend.layouts.master')
@section('title')
    Collections - {{config('app.name')}}
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
            <div class="col-lg-12 col-md-12 col-sm-12 under">
                <div class="row  w-100 mx-auto">
                    <div class="col-12 my-3">
                        <p class="text-uppercase mb-0 fs-3 MainHeading fw-sm-bold">
                            Featured Deals
                        </p>
                    </div>

                    {{
     $Coupons(

     [
         'limit'=>0,
         'paginate'=>false,
         'col'=>'2half',
         'collection'=>Request::segment(2),
 ]
 )
 }}
                </div>
            </div>

{{--            <div class="col-12 mx-auto text-center my-3">--}}
{{--                <button class="custom_btn">VIEW ALL</button>--}}
{{--            </div>--}}
        </div>
    </div>

@endsection
