


@if($ThemeSettings('option-project-type','ecommerce'))
    @extends('frontend.layouts.master')
@section('content')
    <!-- BANNER SECTION BEGIN -->


{{--@dd(session('cart'))--}}
    <!-- SECOND HEADER SECTION BEGIN -->
    <section class="header-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12">
                    <a href="javascriptvoid:(0)"><img src="{{asset('frontend/ecommerce/images/logo.jpg')}}" alt="image" class="img-fluid"></a>
                </div>
                <div class="col-md-8 col-sm-12 col-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><i class="fa fa-cc-amex" aria-hidden="true"></i> Payment Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><i class="fa fa-list-alt" aria-hidden="true"></i> Order Completed</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- SECOND HEADER SECTION END -->
    <!-- INFORMATION SECTION BEGIN -->
    <section class="info-sec-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="apparel-heading">
                                        <h5 class="fs-4">GotApparel Safe, and Secure Shopping Cart <i class="fa fa-lock" aria-hidden="true"></i></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="address-box-text">
                                <p>We ship orders only to a physical address <span>(no P.O Boxes). P.O Boxes</span> or <span>APO/FPO</span> can be used as the credit card billing address.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-12">
                                    <div class="account-info-box">
                                        <h4><span>1</span> Account Information</h4>
                                    </div>
{{--                                    <div class="reward-text-box">--}}
{{--                                            <h6><span>22 Rewards Points</span> Available. Please Login to Unlock Reward Points. </h6>--}}
{{--                                    </div>--}}
                                    <div class="sign-in-heading">
                                        <div class="sign-in-content">
                                            <hr class="fs-4">Sign in</h5>
                                        </div>
                                        <div class="collapse-content">
                                            <a href="javascriptvoid:(0)">Collapse</a>
                                        </div>
                                    </div>
                                    <div class="forms-fields">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
{{--                                            <input type="hidden" name="total" value="{{$total}}">--}}
                                            <div class="box-fields">
                                                <input type="text" name="email" class="form-control shadow-none" placeholder="Your Email Address">
                                            </div>
                                            <div class="box-fields">
                                                <input type="text" name="password" class="form-control shadow-none" placeholder="Your Password">
{{--                                                <div class="eye-sign">--}}
{{--                                                    <a href="javascriptvoid:(0)"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="flex-form-btn">

                                                <div class="login-form-btn" >
                                                    <a class="text-white">LOGIN</a>
                                                </div>

                                                <div class="create-form-btn">
                                                    <a href="{{url('register')}}">CREATE MY ACCOUNT</a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="continue-guest">
                                        <h6>OR-Continue as Guest</h6>
                                    </div>
                                    <form  action="{{url('order-complete')}}"  enctype="multipart/form-data"
                                           method="post"
                                           class="require-validation"
                                           data-cc-on-file="false"
                                           data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                           id="payment-form">
                                        @csrf
                                    <div class="guest-email">
                                        <input type="text" value="{{auth()->user()->email ?? ''}}" name="guest_email" class="form-control shadow-none" placeholder="Your Email Address" required>
                                    </div>
                                    <div class="checkbox-content">
                                        <p><input type="checkbox" value="agree" name="terms_condition">  I agree to GotApparel <span>Terms of Services and Privacy Policy.</span></p>
                                    </div>
                                    <div class="account-info-box">
                                        <h4><span>2</span> Shipping Information</h4>
                                    </div>

                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="shipping_first_name" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text"  name="shipping_last_name" class="form-control shadow-none">
                                            </div>
                                        </div>

                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex form-flex-grey">
                                                <label>Country <span>*</span></label>
                                                <select class="form-control shadow-none" name="shipping_country">
                                                    <option>Pakistan</option>
                                                    <option>US</option>
                                                    <option>Canada</option>
                                                    <option>UK</option>
                                                    <option>Germany</option>
                                                </select>
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Zip Code <span>*</span></label>
                                                <input name="shipping_zip_code" type="text" class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Street Address <span>*</span></label>
                                                <input type="text" name="shipping_street_address" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Apartment, Suite, unit, Floor etc <span>*</span></label>
                                                <input type="text" name="shipping_apartment_detail" class="form-control shadow-none" >
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>City <span>*</span></label>
                                                <input type="text" name="shipping_city" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex form-flex-grey">
                                                <label>State <span>*</span> </label>
                                                <select name="shipping_state" class="form-control shadow-none">
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Phone <span>*</span></label>
                                                <input name="shipping_phone"  type="text" class="form-control shadow-none">
                                            </div>
                                        </div>

                                    <div class="account-info-box">
                                        <h4><span>3</span> Select Shipping Method</h4>
                                    </div>
                                    <div class="reward-text-box">
                                        <h6>Place your order by 1PM PST to get it by estimated days below.</h6>
                                    </div>
                                    <div class="method-selector">
                                        <h6>Standard</h6>
                                            <p>
                                                <input type="radio" id="test1" name="radio-group">
                                                <label for="test1"><span>$12.96</span> <span>Estimated Delivery</span><span>3-7 Business Days</span></label>
                                            </p>
                                    </div>
                                    <div class="account-info-box">
                                        <h4><span>4</span> Billing Information</h4>
                                    </div>

                                    <div class="billing-form-box">
                                        <ul>
                                            <li><input type="radio" value="default"  name="shipping_type"> Same as Shipping Address</li>
                                            <li><input type="radio" value="shipping"  name="shipping_type"> Use different Billing Address</li>

                                            <li>For different Billing/Shipping Address orders OR large orders, please click on the <a href="javascriptvoid:(0)">Link</a> to check our policy.</li>
                                        </ul>
                                    </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="billing_first_name" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text"  name="billing_last_name" class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex form-flex-grey">
                                                <label>Country <span>*</span></label>
                                                <select class="form-control shadow-none" name="billing_country">
                                                    <option>Pakistan</option>
                                                    <option>US</option>
                                                    <option>Canada</option>
                                                    <option>UK</option>
                                                    <option>Germany</option>
                                                </select>
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Zip Code <span>*</span></label>
                                                <input name="billing_zip_code" type="text" class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Street Address <span>*</span></label>
                                                <input type="text" name="billing_street_address" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Apartment, Suite, unit, Floor etc <span>*</span></label>
                                                <input type="text" name="billing_apartment_detail" class="form-control shadow-none" >
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>City <span>*</span></label>
                                                <input type="text" name="billing_city" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex form-flex-grey">
                                                <label>State <span>*</span> </label>
                                                <select name="billing_state" class="form-control shadow-none">
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Phone <span>*</span></label>
                                                <input name="billing_phone"  type="text" class="form-control shadow-none">
                                            </div>
                                        </div>




                                    <div class="account-info-box">
                                        <h4><span>5</span> Your Payment Information</h4>
                                    </div>
                                    <div class="method-selector payment-selector">

                                            <p>
                                                <input type="radio" id="test4" name="radio-group">
                                                <label for="test4"><span>Credit Card</span> <span><img src="images/ct1.png" alt="image" class="img-fluid"></span></label>
                                            </p>

                                            <p>
                                                <input type="radio" id="test3" name="radio-group">
                                                <label for="test3"><span>PayPal Express</span> <span><img src="images/ct3.png" alt="image" class="img-fluid"></span></label>
                                            </p>

                                    </div>
{{--                                    <div class="border-card-form">--}}

{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>Name On Cardd <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input">--}}
{{--                                                    <input type="text" class="form-control shadow-none" >--}}
{{--                                                    <input type="text" id="card_no" class="form-control shadow-none shadow-none "  size='4' autocomplete="off" >--}}


{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label for="card_name">Credit Card Number <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input">--}}
{{--                                                    <input type="number" class="form-control shadow-none" >--}}
{{--                                                    <input type="text" id="card_name" class="form-control shadow-none shadow-none card-number" size='20' size='20' autocomplete="off" >--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>Credit Card Type <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input form-flex-grey">--}}
{{--                                                    <select class="form-control shadow-none">--}}
{{--                                                        <option>CARD TYPE</option>--}}
{{--                                                        <option>CARD TYPE</option>--}}
{{--                                                        <option>CARD TYPE</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label for="">Expiration <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input form-flex-grey name-card-new">--}}
{{--                                                    <select class="form-control shadow-none">--}}
{{--                                                        <option>MONTH</option>--}}
{{--                                                        <option>MONTH</option>--}}
{{--                                                        <option>MONTH</option>--}}
{{--                                                    </select>--}}
{{--                                                    <input--}}
{{--                                                            class='form-control shadow-none card-expiry-month shadow-none' placeholder='MM' size='2'--}}
{{--                                                            type='text'>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input form-flex-grey name-card-new">--}}
{{--                                                    <select class="form-control shadow-none">--}}
{{--                                                        <option>YEAR</option>--}}
{{--                                                        <option>YEAR</option>--}}
{{--                                                        <option>YEAR</option>--}}
{{--                                                    </select>--}}
{{--                                                    <input--}}
{{--                                                            class='form-control shadow-none card-expiry-year shadow-none' placeholder='YYYY' size='4'--}}
{{--                                                            type='text'>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>CVC/CVCC <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input">--}}
{{--                                                    <input autocomplete='off'--}}
{{--                                                           class='form-control shadow-none card-cvc date shadow-none' placeholder='ex. 311' size='4'--}}
{{--                                                           type='text'>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                    </div>--}}
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <label class='control-label'>Name on Card</label> <input
                                                        class='form-control shadow-none' size='4' type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group card required'>
                                                <label class='control-label'>Card Number</label> <input
                                                        autocomplete='off' class='form-control shadow-none card-number' size='20'
                                                        type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                                class='form-control shadow-none card-cvc' placeholder='ex. 311' size='4'
                                                                                                type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                        class='form-control shadow-none card-expiry-month' placeholder='MM' size='2'
                                                        type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                        class='form-control shadow-none card-expiry-year' placeholder='YYYY' size='4'
                                                        type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>Please correct the errors and try
                                                    again.</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                                            </div>
                                        </div>

                                    <div class="my-order-btn">
                                        <button type="button">PLACE MY ORDER</button>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="small-table">

                                        <hr class="fs-4">Your Cart:{{count(session('cart'))}} {{count(session('cart')) <= 1 ? 'item' : 'Items' }}</h5>
                                        @php $total = 0 @endphp
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                @php $total += $details['discount_price'] * $details['quantity'] @endphp
                                        <div class="small-tab-flex">
                                            <div class="small-tab-img">
                                                <img src="{{asset('images/media/'.$details['image'])}}" style="height:60px;width:100px;" alt="image" class="img-fluid">
                                            </div>
                                            <div class="small-tab-content">
                                                <h6>{{$details['name']}}</h6>
                                                <p>Color: White</p>
                                            </div>
                                        </div>
                                        <div class="small-tab-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        @php
                                                                 $grand = $details['discount_price'] * $details['quantity'];
                                                         @endphp
                                                       <input type="hidden" value="{{$grand}}" name="grand"> </input>
                                                        <td>S</td>
                                                        <td>{{$currency_symbol}}{{ $details['discount_price'] }}</td>
                                                        <td>{{ $details['quantity'] }}</td>
                                                        <td class="org-cg">{{$currency_symbol}}{{ $details['discount_price'] * $details['quantity'] }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                            @endforeach
                                        @endif


                                    </div>
{{--                                    <div class="small-table small-table-new">--}}
{{--                                        <div class="small-tab-flex">--}}
{{--                                            <div class="small-tab-img">--}}
{{--                                                <img src="images/sm-tshirt.jpg" alt="image" class="img-fluid">--}}
{{--                                            </div>--}}
{{--                                            <div class="small-tab-content">--}}
{{--                                                <h6>Gildan G500 Men's Heavy Cotton 5.3 OZ. T-Shirt</h6>--}}
{{--                                                <p>Color: White</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="small-tab-table">--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th scope="col">Size</th>--}}
{{--                                                        <th scope="col">Price</th>--}}
{{--                                                        <th scope="col">Quantity</th>--}}
{{--                                                        <th scope="col">Total</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>XS</td>--}}
{{--                                                        <td>$6.31</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$6.31</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>S</td>--}}
{{--                                                        <td>$6.31</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$6.31</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>M</td>--}}
{{--                                                        <td>$6.31</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$6.31</td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="main-coupon-form">
                                        <div class="coupon-form-input">
                                            <input type="text" id="discount_code" name="discount_code" class="form-control shadow-none" placeholder="Enter your promo code">
                                            <span class="discount-result warning" style="display:hide;"></span>
                                        </div>
                                        <div class="coupon-form-btn">
                                             <button class="discount">
{{--                                                <span class="ajax_load">--}}
{{--                                               </span>--}}
                                                APPLY
                                            </button>
                                        </div>
                                    </div>
                                    <div class="cou-po-link">
                                        <a href="javascriptvoid:(0)">Coupon Policy</a>
                                    </div>
                                    <div class="calculation-table">
                                        <h6>Order Summary</h6>
                                        <ul>
                                            @php
                                                $discount_percent = session('discount')['discounted_price'] ?? 0 ;
                                                 $pre_total = $shipemt_charges + $grand;

                                                 $order_total = $pre_total / 100 * (int)$discount_percent;
                                            
                                            @endphp
                                            <li><strong>Sub Total:</strong> <span class="pull-right pr-orange"><strong>{{$currency_symbol}}.{{$grand}}</strong></span></li>
                                            <li>Standard Shipping: <span class="pull-right">{{$currency_symbol}}.{{$shipemt_charges}}</span></li>
                                            <li>Sales Tax: <span class="pull-right">$0.00</span></li>
                                            <li>Coupon Discount: <span class="pull-right">{{$currency_symbol}}.{{$discount_percent }}%</span></li>
                                            <li><strong>Order Total:</strong> <span class="pull-right pr-orange">   <strong>{{$pre_total - $order_total ?? 0}}</strong></span></li>
                                        </ul>
                                    </div>
                                    <div class="important-note">
                                        <p><strong>Important Note:</strong> If you are having difficulty placing your order, please call 866-847-8678. We will be happy to assist you in the order process.</p>
                                    </div>
                                    <div class="secure-img-pol">
                                        <img src="{{asset('frontend/ecommerce/images/secure-img.png')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="quality-order-detail">
                                        <hr class="fs-4">SECURITY-PRIVACY-QUALITY</h5>
                                        <h6>100% SATISFACTION GUARANTEED</h6>
                                    </div>
                                    <div class="your-order-privacy">
                                        <h6>YOUR PRIVACY</h6>
                                        <p>Fjackets.com respects the privacy of its valued customers. For more details please read our privacy policy.</p>
                                    </div>
                                    <div class="your-order-privacy">
                                        <h6>CREDIT CARD SECURITY</h6>
                                        <p>All personal information you submit is encrypted using Secure Socket Layer (SSL) protection. Other payment methods also available.</p>
                                        <a href="javascriptvoid:(0)"><img src="{{asset('frontend/ecommerce/images/paypal-img.png')}}" alt="image" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="apparel-heading">
                                        <hr class="fs-4">GotApparel Safe, and Secure Shopping Cart <i class="fa fa-lock" aria-hidden="true"></i></h5>
                                    </div>
                                </div>
                            </div>

                        </div>

{{--                        <div class="tab-pane" id="tabs-3" role="tabpanel">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-12 col-12">--}}
{{--                                    <div class="apparel-heading">--}}
{{--                                        <hr class="fs-4">GotApparel Safe, and Secure Shopping Cart <i class="fa fa-lock" aria-hidden="true"></i></h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="address-box-text">--}}
{{--                                <p>We ship orders only to a physical address <span>(no P.O Boxes). P.O Boxes</span> or <span>APO/FPO</span> can be used as the credit card billing address.</p>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-8 col-sm-12 col-12">--}}
{{--                                    <div class="account-info-box">--}}
{{--                                        <h4><span>1</span> Account Information</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="reward-text-box">--}}
{{--                                        <h6><span>22 Rewards Points</span> Available. Please Login to Unlock Reward Points. </h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="sign-in-heading">--}}
{{--                                        <div class="sign-in-content">--}}
{{--                                            <hr class="fs-4">Sign in</h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="collapse-content">--}}
{{--                                            <a href="javascriptvoid:(0)">Collapse</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="forms-fields">--}}
{{--                                            <div class="box-fields">--}}
{{--                                                <input type="text" class="form-control shadow-none" placeholder="Your Email Address">--}}
{{--                                            </div>--}}
{{--                                            <div class="box-fields">--}}
{{--                                                <input type="text" class="form-control shadow-none" placeholder="Your Password">--}}
{{--                                                <div class="eye-sign">--}}
{{--                                                    <a href="javascriptvoid:(0)"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex-form-btn">--}}
{{--                                                <div class="login-form-btn">--}}
{{--                                                    <a href="javascriptvoid:(0)">LOGIN</a>--}}
{{--                                                </div>--}}
{{--                                                <div class="create-form-btn">--}}
{{--                                                    <a href="javascriptvoid:(0)">CREATE MY ACCOUNT</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="continue-guest">--}}
{{--                                        <h6>OR-Continue as Guest</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="guest-email">--}}
{{--                                        <input type="text" class="form-control shadow-none" placeholder="Your Email Address">--}}
{{--                                    </div>--}}
{{--                                    <div class="checkbox-content">--}}
{{--                                        <p><input type="checkbox"> I agree to GotApparel <span>Terms of Services and Privacy Policy.</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="account-info-box">--}}
{{--                                        <h4><span>2</span> Shipping Information</h4>--}}
{{--                                    </div>--}}

{{--                                        <div class="form-boxes-flex">--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>First Name <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>Last Name <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-boxes-flex">--}}
{{--                                            <div class="form-label-flex form-flex-grey">--}}
{{--                                                <label>Country <span>*</span></label>--}}
{{--                                                <select class="form-control shadow-none">--}}
{{--                                                    <option>Pakistan</option>--}}
{{--                                                    <option>US</option>--}}
{{--                                                    <option>Canada</option>--}}
{{--                                                    <option>UK</option>--}}
{{--                                                    <option>Germany</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>Zip Code <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-boxes-flex">--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>Street Address <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>Apartment, Suite, unit, Floor etc <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-boxes-flex">--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>City <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-label-flex form-flex-grey">--}}
{{--                                                <label>State <span>*</span> </label>--}}
{{--                                                <select class="form-control shadow-none">--}}
{{--                                                    <option>Alabama</option>--}}
{{--                                                    <option>Alabama</option>--}}
{{--                                                    <option>Alabama</option>--}}
{{--                                                    <option>Alabama</option>--}}
{{--                                                    <option>Alabama</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-boxes-flex">--}}
{{--                                            <div class="form-label-flex">--}}
{{--                                                <label>Phone <span>*</span></label>--}}
{{--                                                <input type="text" class="form-control shadow-none">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    <div class="account-info-box">--}}
{{--                                        <h4><span>3</span> Select Shipping Method</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="reward-text-box">--}}
{{--                                        <h6>Place your order by 1PM PST to get it by estimated days below.</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="method-selector">--}}
{{--                                        <h6>Standard</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="account-info-box">--}}
{{--                                        <h4><span>4</span> Billing Information</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="billing-form-box">--}}
{{--                                        <ul>--}}
{{--                                            <li><input type="radio" id="test1" name="radio-group"> Same as Shipping Address</li>--}}
{{--                                            <li><input type="radio" id="test1" name="radio-group"> Use different Billing Address</li>--}}
{{--                                            <li>For different Billing/Shipping Address orders OR large orders, please click on the <a href="javascriptvoid:(0)">Link</a> to check our policy.</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="account-info-box">--}}
{{--                                        <h4><span>5</span> Your Payment Information</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="method-selector payment-selector">--}}

{{--                                            <p>--}}
{{--                                                <input type="radio" id="test4" name="radio-group">--}}
{{--                                                <label for="test4"><span>Credit Card</span> <span><img src="images/ct1.png" alt="image" class="img-fluid"></span></label>--}}
{{--                                            </p>--}}
{{--                                            <p>--}}
{{--                                                <input type="radio" id="test2" name="radio-group">--}}
{{--                                                <label for="test2"><span>Amazon Pay</span> <span><img src="images/ct2.png" alt="image" class="img-fluid"></span></label>--}}
{{--                                            </p>--}}
{{--                                            <p>--}}
{{--                                                <input type="radio" id="test3" name="radio-group">--}}
{{--                                                <label for="test3"><span>PayPal Express</span> <span><img src="images/ct3.png" alt="image" class="img-fluid"></span></label>--}}
{{--                                            </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="border-card-form">--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>Name On d <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input">--}}
{{--                                                    <input type="text" class="form-control shadow-none" >--}}
{{--                                                </div><input type="text" id="card_no" class="form-control shadow-none shadow-none "  size='4' autocomplete="off" >--}}

{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>Credit Card Number <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input">--}}
{{--                                                    <input type="number" class="form-control shadow-none" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>Credit Card Type <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input form-flex-grey">--}}
{{--                                                    <select class="form-control shadow-none">--}}
{{--                                                        <option>CARD TYPE</option>--}}
{{--                                                        <option>CARD TYPE</option>--}}
{{--                                                        <option>CARD TYPE</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>Expiration <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input form-flex-grey name-card-new">--}}
{{--                                                    <select class="form-control shadow-none">--}}
{{--                                                        <option>MONTH</option>--}}
{{--                                                        <option>MONTH</option>--}}
{{--                                                        <option>MONTH</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input form-flex-grey name-card-new">--}}
{{--                                                    <select class="form-control shadow-none">--}}
{{--                                                        <option>YEAR</option>--}}
{{--                                                        <option>YEAR</option>--}}
{{--                                                        <option>YEAR</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="main-card-border">--}}
{{--                                                <div class="border-card-label">--}}
{{--                                                    <label>CVC/CVCC <span>*</span></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="name-card-input">--}}
{{--                                                    <input type="number" class="form-control shadow-none" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="my-order-btn">--}}
{{--                                        <button type="button">PLACE MY ORDER</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-12 col-12">--}}
{{--                                    <div class="small-table">--}}
{{--                                        <hr class="fs-4">Cart Items (2)</h5>--}}
{{--                                        <div class="small-tab-flex">--}}
{{--                                            <div class="small-tab-img">--}}
{{--                                                <img src="images/sm-tshirt.jpg" alt="image" class="img-fluid">--}}
{{--                                            </div>--}}
{{--                                            <div class="small-tab-content">--}}
{{--                                                <h6>Gildan G500 Men's Heavy Cotton 5.3 OZ. T-Shirt</h6>--}}
{{--                                                <p>Color: White</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="small-tab-table">--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th scope="col">Size</th>--}}
{{--                                                        <th scope="col">Price</th>--}}
{{--                                                        <th scope="col">Quantity</th>--}}
{{--                                                        <th scope="col">Total</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>S</td>--}}
{{--                                                        <td>$2.58</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$2.58</td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="small-table small-table-new">--}}
{{--                                        <div class="small-tab-flex">--}}
{{--                                            <div class="small-tab-img">--}}
{{--                                                <img src="images/sm-tshirt.jpg" alt="image" class="img-fluid">--}}
{{--                                            </div>--}}
{{--                                            <div class="small-tab-content">--}}
{{--                                                <h6>Gildan G500 Men's Heavy Cotton 5.3 OZ. T-Shirt</h6>--}}
{{--                                                <p>Color: White</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="small-tab-table">--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th scope="col">Size</th>--}}
{{--                                                        <th scope="col">Price</th>--}}
{{--                                                        <th scope="col">Quantity</th>--}}
{{--                                                        <th scope="col">Total</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>XS</td>--}}
{{--                                                        <td>$6.31</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$6.31</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>S</td>--}}
{{--                                                        <td>$6.31</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$6.31</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>M</td>--}}
{{--                                                        <td>$6.31</td>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <td class="org-cg">$6.31</td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main-coupon-form">--}}
{{--                                        <div class="coupon-form-input">--}}
{{--                                            <input type="text" class="form-control shadow-none" placeholder="Enter your promo code">--}}
{{--                                        </div>--}}
{{--                                        <div class="coupon-form-btn">--}}
{{--                                            <button type="button">APPLY</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="cou-po-link">--}}
{{--                                        <a href="javascriptvoid:(0)">Coupon Policy</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="calculation-table">--}}
{{--                                        <h6>Order Summary</h6>--}}
{{--                                        <ul>--}}
{{--                                            <li><strong>Sub Total:</strong> <span class="pull-right pr-orange"><strong>$21.51</strong></span></li>--}}
{{--                                            <li>Standar Shipping: <span class="pull-right">$12.96</span></li>--}}
{{--                                            <li>Sales Tax: <span class="pull-right">$0.00</span></li>--}}
{{--                                            <li>Coupon Discount: <span class="pull-right">$0.00</span></li>--}}
{{--                                            <li><strong>Order Total:</strong> <span class="pull-right pr-orange"><strong>$34.47</strong></span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="important-note">--}}
{{--                                        <p><strong>Important Note:</strong> If you are having difficulty placing your order, please call 866-847-8678. We will be happy to assist you in the order process.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="secure-img-pol">--}}
{{--                                        <img src="images/secure-img.png" alt="image" class="img-fluid">--}}
{{--                                    </div>--}}
{{--                                    <div class="quality-order-detail">--}}
{{--                                        <hr class="fs-4">SECURITY-PRIVACY-QUALITY</h5>--}}
{{--                                        <h6>100% SATISFACTION GUARANTEED</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="your-order-privacy">--}}
{{--                                        <h6>YOUR PRIVACY</h6>--}}
{{--                                        <p>Fjackets.com respects the privacy of its valued customers. For more details please read our privacy policy.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="your-order-privacy">--}}
{{--                                        <h6>CREDIT CARD SECURITY</h6>--}}
{{--                                        <p>All personal information you submit is encrypted using Secure Socket Layer (SSL) protection. Other payment methods also available.</p>--}}
{{--                                        <a href="javascriptvoid:(0)"><img src="images/paypal-img.png" alt="image" class="img-fluid"></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>


{{--        hidden fields data--}}
        <input type="hidden" name="grand" value="{{$total}}">
        <button type="submit"> click</button>
    </form>
    </section>
    <!-- INFORMATION SECTION END -->
    <!-- QUICK LINKS SECTION BEGIN -->
    <section class="quick-links-new">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="new-links">
                        <ul>
                            <li><a href="javascriptvoid:(0)">Contact Us</a></li>
                            <li><a href="javascriptvoid:(0)">Returns</a></li>
                            <li><a href="javascriptvoid:(0)">Shipping</a></li>
                            <li><a href="javascriptvoid:(0)">FAQ's</a></li>
                            <li><a href="javascriptvoid:(0)">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
        $(function() {

            var $form         = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
    <!-- QUICK LINKS SECTION END -->
    <!-- PRODUCT SLIDER SECTION END -->
    <!-- PRODUCT SHIPPING SECTION BEGIN -->

    <!-- PRODUCT SHIPPING SECTION END -->
    <!-- PRODUCT REVIEWS SECTION BEGIN -->

    <!-- YOU MAY LIKE SECTION BEGIN -->

    <!-- YOU MAY LIKE SECTION END -->
    <!-- MOHRIM DIFFERENCE SECTION BEGIN -->

    <script>
        $(".discount").click(function(e) {
            e.preventDefault();

            var ele = $(this);


            // if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{url('coupon_discount')}}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                     data : $('#discount_code').val(),

                },
                dataType: "json",

                success: function (response) {
                    let cl;
                    console.log(response.msg);
                    if(response.success){
                         cl = 'success';
                    }else{
                         cl = 'warning';
                    }
                    $('.discount-result').addClass(cl).text(response.msg).show();
                    // window.location.reload();

                }
            });
            // }
        });
    </script>
    <!-- SUBSCRIBE SECTION END -->
@endsection
@endif
