





@if($ThemeSettings('option-project-type','ecommerce'))
    @extends('frontend.layouts.master')
@section('content')
    <!-- BANNER SECTION BEGIN -->

{{--       @foreach((array) session('cart') as $id => $details)--}}
{{--           @php $total += $details['price'] * $details['quantity'] @endphp--}}
{{--       @endforeach--}}
{{--    @dd(session('cart'))--}}
    <section class="got-apparel-sec">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="apparel-heading">--}}
{{--                        <h5><i class="fa fa-lock" aria-hidden="true"></i></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-9 col-sm-12 col-12">
{{--                    <div class="pro-check-btn">--}}
{{--                        <div class="con-shop-btn">--}}
{{--                            <a href="javascriptvoid:(0)">CONTINUE SHOPPING</a>--}}
{{--                        </div>--}}
{{--                        <div class="proceed-btn">--}}
{{--                            <a href="javascriptvoid:(0)">PROCEED TO CHECKOUT <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="order-points">--}}
{{--                        <p>This order will earn you <span class="color-points">22 points.</span> Complete your order & earn discounts for a future purchase.</p>--}}
{{--                    </div>--}}

                    <div class="your-cart-flex">
                        @if(!Session::exists('cart'))
                            <div class="your-cart-txt">
                                <h6>Your Cart has 0 item</h6>
                            </div>

                            <div class="empty-cart">
                                <a href="javascriptvoid:(0)"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> EMPTY CART</a>
                            </div>
                        @else

                            <div class="your-cart-txt">
                                <h6>Your Cart:{{count(session('cart'))}} {{count(session('cart')) <= 1 ? 'item' : 'Items' }} </h6>
                            </div> 

                        @endif

                    </div>
                    <div class="callBackCart">

                        @include('frontend/ecommerce-layouts/cart-append')

                    </div>

                    {{--                    <div class="img-flex">--}}
{{--                        <div class="img-inn">--}}
{{--                            <img src="images/sm-tshirt.jpg" alt="image" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="tshirt-content">--}}
{{--                            <h6>Next Level N6210 Men's Cvc Crew Tee </h6>--}}
{{--                            <p>Color: Tahiti Blue <a href="javascriptvoid:(0)">Edit</a></p>--}}
{{--                            <p>Total Quantity: (3)</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="shirt-table-new">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">Size</th>--}}
{{--                                    <th scope="col">Unit Price</th>--}}
{{--                                    <th scope="col">Quantity</th>--}}
{{--                                    <th scope="col">Sub Total</th>--}}
{{--                                    <th scope="col"></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>XS</td>--}}
{{--                                    <td class="org-cg"><span class="cut-pr">$17.03</span> $6.531</td>--}}
{{--                                    <td>--}}
{{--                                        <div class="number">--}}
{{--                                            <span class="minus">-</span>--}}
{{--                                            <input type="text" value="1"/>--}}
{{--                                            <span class="plus">+</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="org-cg"><span class="cut-pr">$17.03</span> $6.531</td>--}}
{{--                                    <td><a href="javascriptvoid:(0)" class="cross-sign"><i class="fa fa-times" aria-hidden="true"></i></a></td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>S</td>--}}
{{--                                    <td class="org-cg"><span class="cut-pr">$17.03</span> $6.531</td>--}}
{{--                                    <td>--}}
{{--                                        <div class="number">--}}
{{--                                            <span class="minus">-</span>--}}
{{--                                            <input type="text" value="1"/>--}}
{{--                                            <span class="plus">+</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="org-cg"><span class="cut-pr">$17.03</span> $6.531</td>--}}
{{--                                    <td><a href="javascriptvoid:(0)" class="cross-sign"><i class="fa fa-times" aria-hidden="true"></i></a></td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>M</td>--}}
{{--                                    <td class="org-cg"><span class="cut-pr">$17.03</span> $6.531</td>--}}
{{--                                    <td>--}}
{{--                                        <div class="number">--}}
{{--                                            <span class="minus">-</span>--}}
{{--                                            <input type="text" value="1"/>--}}
{{--                                            <span class="plus">+</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="org-cg"><span class="cut-pr">$17.03</span> $6.531</td>--}}
{{--                                    <td><a href="javascriptvoid:(0)" class="cross-sign"><i class="fa fa-times" aria-hidden="true"></i></a></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="coupon-content">--}}
{{--                        <div class="coupon-inner-cont">--}}
{{--                            <div class="coupon-input">--}}
{{--                                <input type="text" class="form-control" placeholder="Have a promo code?">--}}
{{--                            </div>--}}
{{--                            <div class="apply-coupon-btn">--}}
{{--                                <a href="javascriptvoid:(0)">APPLY COUPON</a>--}}
{{--                            </div>--}}
{{--                            <div class="coupon-policy">--}}
{{--                                <a href="javascriptvoid:(0)">Coupon Policy</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="coupon-discount">--}}
{{--                            <h6>Coupon Discount: <span>$0.00</span></h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="pro-check-btn">
                        <div class="con-shop-btn">
                            <a href="{{url('collection/all')}}">CONTINUE SHOPPING</a>
                        </div>
                        @if(Session::exists('cart'))

                            @if(count(session('cart')) == 0)
                        <div class="proceed-btn" >
                            <a href="{{url('checkout')}}" disabled="disabled">PROCEED TO CHECKOUT <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                        </div>
                            @else
                                <div class="proceed-btn" >
                                    <a href="{{url('checkout')}}" disabled="disabled">PROCEED TO CHECKOUT <i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                </div>
                          @endif
                            @endif
                    </div>
                    <div class="left-items">
                        <p>You may have left items in your cart earlier <a href="javascriptvoid:(0)">Login</a> to view your cart now. Already logged-in or do not have one? please disregard this message.</p>
                    </div>
                    <div class="got-policy">
                        <h4>GotApparel.com at a glance:</h4>
                        <ul>
                            <li>Your orders are safe with us and delivered to you fast.</li>
                            <li>98% of the orders delivered with in two days.</li>
                            <li>Free Shipping on Qualified Orders.</li>
                            <li>99% customer satisfaction on GotApparel.com, 98% positive Feedback on our Amazon Store, and 99.5% positive Feedback on our EBAY Store.</li>
                            <li>Payment options: Paypal Express, Amazon Checkout, Visa, Master Card, American Express, Discover.</li>
                            <li><span>Easy returns and Exchanges,</span> <span>Toll free Customer Service</span> and <span>Email.</span></li>
                            <li>Your GotApparel Store is maintained safe and secure with the help of <span>McAffee Secure,</span> <span>GeoTrust,</span> and <span>Authorize.net.</span></li>
                        </ul>
                    </div>
                    <p class="welcome-txt">Welcome and enjoy your shopping with confidence.</p>
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="your-order-detail">
                        <h6>YOUR ORDER DETAILS</h6>
                        <p>Your order will be shipped via UPS Ground or USPS. Tracking number will be posted on <span>Order Status</span> as they become available. 98% of the orders are delievered with in two days.</p>
                    </div>
                    <div class="secure-img-pol">
                        <img src="{{asset('frontend/ecommerce/images/secure-img.png')}}" alt="image" class="img-fluid">
                    </div>
                    <div class="quality-order-detail">
                        <h5>SECURITY-PRIVACY-QUALITY</h5>
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
    </section>


 
 
    <section class="subscribe-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="subscribe-bar">
                        <div class="subscribe-content">
                            <h6>Sign up for email</h6>
                        </div>
                        <div class="email-content">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <div class="subscribe-btn">
                                <button type="button" class="btn btn-primary">SUBSCRIBE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="connect-content">
                        <h6>Connect with us</h6>
                        <div class="connect-listing">
                            <ul>
                                <li><a href="javascriptvoid:(0)" class="col1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="javascriptvoid:(0)" class="col2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="javascriptvoid:(0)" class="col3"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="javascriptvoid:(0)" class="col4"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="javascriptvoid:(0)" class="col5"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var buttonPlus  = $(".qty-btn-plus");
        var buttonMinus = $(".qty-btn-minus");

        var incrementPlus = buttonPlus.click(function() {
            var $n = $(this)
                .parent(".qty-container")
                .find(".input-qty");
            $n.val(Number($n.val())+1 );
        });

        var incrementMinus = buttonMinus.click(function() {
            var $n = $(this)
                .parent(".qty-container")
                .find(".input-qty");
            var amount = Number($n.val());
            if (amount > 0) {
                $n.val(amount-1);
            }
        });
    </script>
    <!-- SUBSCRIBE SECTION END -->
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
    ></script>
    <script>

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            // if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        $('.callBackCart').html(response);
                        // window.location.reload();
                    }
                });
            // }
        });

        // EDIT

        $(document).on('click keyup', '.update-cart', function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {

                     $('.callBackCart').html(response);
                    // window.location.reload();
                }
            });
        });

    </script>

@endsection
@endif
