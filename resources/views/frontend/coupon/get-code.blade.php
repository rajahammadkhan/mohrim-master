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
        <div class="row my-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row  w-100 mx-auto">
                    <div class="col-md-7 mx-auto my-3">
                        <div class="card shadow text-center py-4 border-0">
                            <div class="card-body ">
                                <img width="150px" class="my-4" src="{{asset('frontend/right.png')}}" alt="">
                                @if($coupon->compare_price != null & $coupon->regular_price != null )
                                   <h4 class="text-uppercase mb-0 fs-3 text-purp fw-sm-bold"> You've saved ${{(int)$coupon->compare_price - (int)$coupon->regular_price}}</h4>
                                @endif
                                <p>Coupon may expire at anytime. Use it now!</p>


                                    <div class="clipboard">
                                        <input onclick="copy()" class="copy-input" value="{{$coupon->coupon_code}}" id="copyClipboard" readonly>
                                        <button class="copy-btn" id="copyButton" onclick="copy()">Copy & Go to the store</button>
                                    </div>
                                    <div id="copied-success" class="copied">
                                        <span>Copied!</span>
                                    </div>

                            </div>
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
<style>
    .clipboard {
        position: relative;
    }
    /* You just need to get this field */
    .copy-input {
        /*max-width: 275px;*/
        width: 50%;
        cursor: pointer;
        background-color: #eaeaeb;
        border:none;
        color:#6c6c6c;
        font-size: 22px;
        border-radius: 0;
        padding: 10px;
        font-family: 'Montserrat', sans-serif;

    }
    .copy-input:focus {
        outline:none;
    }

    .copy-btn {
        /*width:40px;*/
        background-color: #3b589d;
        display: block;
        font-size: 18px;
        padding: 6px 9px;
        border-radius: 0 !important;
        border:none;
        color:#fff;
        /*margin-left:-50px;*/
        transition: all .4s;
        margin: 10px auto;
    }
    .copy-btn:hover {
        /*transform: scale(1.3);*/
        color:#fff;
        cursor:pointer;
        box-shadow: 0 0 15px #ccc !important;
    }

    .copy-btn:focus {
        outline:none;
    }

    .copied {
        font-family: 'Montserrat', sans-serif;
        width: 75px;
        display: none;
        position:fixed;
        bottom: 20px;
        left: 0;
        right: 0;
        margin: auto;
        color:#000;
        padding: 15px 15px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 3px 15px #b8c6db;
        -moz-box-shadow: 0 3px 15px #b8c6db;
        -webkit-box-shadow: 0 3px 15px #b8c6db;
    }
    /* You just need to get this field */
</style>
<script>
    function copy() {
        var copyText = document.getElementById("copyClipboard");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        $('#copied-success').fadeIn(800);
        $('#copied-success').fadeOut(800);
        location.href = "{{$coupon->affiliate_url}}";

    }

</script>
