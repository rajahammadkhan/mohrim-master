@extends('management.layouts.master')
@section('title')
    CoupenDiscount Edit - {{config('app.dashboard')}}

@endsection
@section('content')
    <style>

        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }

        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
        body {
            min-height: 100vh;
            /*background-color: #757f9a;*/
            /*background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);*/
        }

        /*
</style>
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> CoupenDiscount Edit</h4>
                            </li>

                        </ul>
                    </div>
                </div>

                <form action="{{route('coupon_discount.update',$language->id)}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Discount Type </strong></label>
                                            <select class="form-control select2" name="discount_type" id="Quiz-type" data-placeholder="Select">
                                                <option {{ $language->percentage_discount == 'percentage_discount' ? 'Selected' : '' }}  value="percentage_discount">Percentage Discount</option>
                                                <option {{ $language->fixed_cart_discount == 'fixed_cart_discount' ? 'Selected' : '' }}  value="fixed_cart_discount">Fixed Cart Discount</option>
                                                <option {{ $language->fixed_product_discount == 'fixed_product_discount' ? 'Selected' : '' }}  value="fixed_product_discount">Fixed Product Discount</option>
                                                <option {{ $language->signup_free_discount == 'signup_free_discount' ? 'Selected' : '' }}  value="signup_free_discount">SignUp Free Discount</option>
                                                <option {{ $language->signup_free_percentage_discount == 'signup_free_percentage_discount' ? 'Selected' : '' }}  value="signup_free_percentage_discount">SignUp Free Percentage Discount</option>
                                                <option {{ $language->percent_discount == 'percent_discount' ? 'Selected' : '' }}  value="percent_discount">Percent Discount</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row my-1">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong>Value</strong></label>
                                            <div class="form-line">
                                                <input  value="{{$language->value}}" type="text" id="erp_question_text"
                                                        class="form-control" name="value"
                                                        placeholder="Enter value" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-1">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Is Applied </strong></label>
                                            <div class="form-line">
                                                <input value="{{$language->is_applied}}" type="text" id="erp_question_text"
                                                       class="form-control" name="is_applied"
                                                       placeholder="Enter" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-1">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Status</strong></label>
                                            <select class="form-control select2" name="status" id="Quiz-type" data-placeholder="Select">
                                                <option {{ $language->status == 1 ? 'Selected' : '' }}  value= 1>Publish</option>
                                                <option {{ $language->status == 0 ? 'Selected' : '' }}  value= 0>draft</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary  my-2 float-right"> Submit   </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
@endsection

