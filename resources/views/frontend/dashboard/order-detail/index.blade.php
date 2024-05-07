@extends('frontend.layouts.master')
@section('title')
    My Order - {{config('app.name')}}
@endsection
@section('content')

<div class="container mt-3 mt-md-5">
{{--    <h2 class="text-charcoal hidden-sm-down">Your Orders</h2>--}}
    <div class="row">
        @include('frontend.dashboard.userSidebar')
        <div class="col-md-9">
            <div class="list-group mb-5">
                @foreach($orderdetail as $order)
                <div class="list-group-item p-3 bg-snow" style="position: relative;">

                    <div class="row w-100 no-gutters">
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Order Number</h6>
                            <a href="" class="text-pebble mb-0 w-100 mb-2 mb-md-0">#A915AFLE4FO</a>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Date</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$order->created_at}}</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Order Status</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$order->order_status}}</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Grand Total</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$order->grand_total}}</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Payement Status</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$order->payment_status}}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <a href="" class="btn btn-primary w-100">View Order</a>
                        </div>
                    </div>
                </div>
                <div class="list-group-item p-3 bg-white">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-9 pr-0 pr-md-3">
                            <div class="alert p-2 alert-success w-100 mb-0">
                                <h6 class="text-green mb-0"><b>Shipped</b></h6>
                                <p class="text-green hidden-sm-down mb-0">Est. delivery between {{$order->created_at}} – {{$order->updated_at}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <a href="" class="btn btn-secondary w-100 mb-2">Track Shipment</a>
                        </div>
                        <div class="row no-gutters mt-3">
                            <div class="col-3 col-md-1">
                                <img class="img-fluid pr-3" src="https://tanga2.imgix.net/https%3A%2F%2Fs3.amazonaws.com%2Ftanga-images%2Ffc79d08c12dc.jpeg?ixlib=rails-2.1.1&fit=crop&w=500&h=500&auto=format%2Ccompress&cs=srgb&s=c9a50d474788f2658d13b21aa62edd6c" alt="">
                            </div>
                            <div class="col-9 col-md-8 pr-0 pr-md-3">
                                <h6 class="text-charcoal mb-2 mb-md-1">
                                    <a href="" class="text-charcoal">460</a>
                                </h6>
                                <ul class="list-unstyled text-pebble mb-2 small">
                                    <li class="">
{{--                                        <b>Color:</b>{{$variations}}--}}
                                    </li>
                                    <li class="">
{{--                                        <b>Size:</b>{{$variations}}--}}
                                    </li>
                                </ul>
                                <h6 class="text-charcoal text-left mb-0 mb-md-2"><b>{{$order->grand_total}}</b></h6>
                            </div>
                            <div class="col-12 col-md-3 hidden-sm-down">
                                <a href="" class="btn btn-secondary w-100 mb-2">Buy It Again</a>
                                <a href="" class="btn btn-secondary w-100">Request a Return</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
