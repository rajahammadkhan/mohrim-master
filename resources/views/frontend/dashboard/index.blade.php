@extends('frontend.layouts.master')
@section('title')
    Home - ONTHE VOUCH
@endsection
@section('description')
    {{--Meta Description here --}}
@endsection
@section('keywords')
    {{--   Meta Keywords here --}}
@endsection
@section('content')
    <style>
        :root {
            --primary: #1B4997;
        }

        ::selection{
            background-color: transparent;
            color: var(--primary);
        }

        body {
            font-family: 'Poppins', sans-serif;

        }

        .primary {
            color: var(--primary);
        }

        .bg-primary-main {
            background-color: var(--primary);
        }

        .list-links {
            font-weight: 500;
            color: #111;
        }

        .fw-sm {
            font-weight: 500;
        }

        .list-links:hover {
            color: #555;
        }

        .list-links.active {
            color: var(--primary);
        }

        .sm-shadow {
            box-shadow: 0 0 10px #0000002f;
        }

        .md-shadow {
            box-shadow: 0 0 10px #00000044;
        }

        .ico {
            width: 22px;
        }

        .coin-ico {
            width: 25px;
        }

        .payment {
            padding: 3.5% 0;
        }

        .buttons button {
            padding: 10px 30px;
            transition: all .3s;
        }

        .select button:hover {
            background-color: #eee !important;
        }

        .delete button:hover {
            background-color: #1b4897cf !important;
        }

        .time {
            position: absolute;
            bottom: 15px;
            right: 15px;
        }
    </style>

    <div class="container-fluid md-shadow rounded-4 my-5 bg-light">
        <div class="row p-3">
           @include('frontend.dashboard.userSidebar')
            <div class="col-lg-9 col-md-9 col-sm-12 my-3">
                <div class="row">
                    <div class="col-12">
                        <div class="payment d-flex bg-white sm-shadow rounded-4 px-4">
                            <img src="{{asset('frontend/img/icons/coins.png')}}" alt="coins" class="mx-3 coin-ico">
                            <h5 class="text-black mb-0">Coupon Savings <span class="money primary ms-4">$ 19.99</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="note d-flex bg-primary-main sm-shadow rounded-4 p-4 my-3">
                            <h5 class="text-white fw-normal mb-0">Notes: <br>You are not required to leave a review for
                                any product you get from Vipon. <br> You can successfully request up to 200 vouchers
                                every 30 days. <br><br>You can successfully request up to 30 vouchers everyday. <br>
                                Remaining Vouchers: <br> 199 (You can successfully request up to 200 vouchers every 30
                                days.</h5>

                        </div>
                    </div>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    <div class="col-12">
                        <div class="buttons d-flex">
                            <div class="select">
                                <button
                                        class="bg-white text-black text-uppercase sm-shadow border-0 rounded-4 fw-sm fs-5">select
                                    all
                                </button>
                            </div>
                            <div class="delete mx-3">
                                <button
                                        class="bg-primary-main text-white text-uppercase sm-shadow border-0 rounded-4 fw-sm fs-5">delete
                                    all
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-3">
                        <div
                                class="row w-100 mx-auto main-pd-card d-flex bg-white sm-shadow rounded-4 p-4 position-relative">
                            <div class="col-1 p-0 my-auto">
                                <img src="assets/img/pd.png" alt="Product_image" class="w-100">
                            </div>
                            <div class="col-8 mx-3">
                                <h5 class="text-truncate">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat labore qui at.
                                    Ex, fugit rem. Accusamus eius quos perferendis odio inventore fugit alias delectus
                                    mollitia possimus consequatur, deserunt voluptatem a?
                                </h5>
                                <h6 class="w-100 d-flex justify-content-between align-items-center">
                                    <div class="left d-flex">
                                        <strike class="text-muted">$39.99USD</strike>
                                        <span class="fs-5 primary mx-2">$20.00USD</span>
                                    </div>
                                    <div class="right">
                                        <p class="fs-6 primary mb-0">
                                            WRIOFT
                                        </p>
                                    </div>

                                </h6>
                                <div class="buy">
                                    <button
                                            class="bg-primary-main text-white text-uppercase sm-shadow border-0 rounded-4 fw-sm px-4 py-2 fs-6">buy
                                        now
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 time">
                                <p class="card-text text-end"><small class="text-muted fw-sm">2022-08-01 01:15:15</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
