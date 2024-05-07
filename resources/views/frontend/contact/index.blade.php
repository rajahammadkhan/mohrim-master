@extends('frontend.layouts.master')
@section('title')
    Contact - {{ config('app.name') }}
@endsection
@section('content')
    <style>
        .contact_main {
            background-image: linear-gradient(180deg, #38c4ca 50%, white 50%);
        }

        .contact_main .form input {
            width: 100%;
            border: none;
            height: 60px;
            margin-bottom: 15px;
            padding-left: 25px;
            background-color: #ffffff;
            outline: none;
            color: #ffffff;
            -webkit-box-shadow: 0 0 7px 0 rgb(0 0 0 / 20%);
            box-shadow: 0 0 7px 0 rgb(0 0 0 / 20%);
        }

        .contact_main .form label {
            font-weight: 500;
            color: #777;
            margin: 5px 0;
        }

        .submit {
            font-weight: 500;
            font-size: 20px;
        }

        label {
            display: unset !important;
        }
    </style>
    <!-- CONTACT US SECTION BEGIN -->
    <section class="contact-us-page-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="bread-crumb">
                        <ul>
                            <li><a href="index.html" class="disable-cls">Home</a></li>
                            <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i></li>
                            <li><a href="javascriptvoid:(0)" class="bold-cls">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <h4 class="contact-page-heading">Contact Us</h4>
            <div class="row contact-detail-border">
                <div class="col-md-4 col-sm-4 col-12 col-bor-rgt">
                    <div class="contact-detail-col">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <h5>Chat with Us</h5>
                        <span>MON-FRI: 7AM-6PM(PST)</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 col-bor-rgt">
                    <div class="contact-detail-col">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h5>FOR SUPPORT: 1-866-847-8678</h5>
                        <span>MON-FRI: 7AM-6PM(PST)</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="contact-detail-col">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <h5>Email Us</h5>
                        <span>support@gotapparel.com</span>
                    </div>
                </div>
            </div>
            <div class="form-content">
                <p>Please Note: Not all products are available at all warehouse locations. Also, Tri-Mountain products ship
                    only from California, and some Augusta products ship only from Atlanta, GA. Due to this reason, some
                    products may take upto five business days to deliver.</p>
                <p>Have a question or need assistance? Please fill out the form below we love to hear from you.</p>
            </div>
            @include('frontend/layouts/error')
            <form id="contact-form" action="{{ url('post-contact') }}" method="post" enctype="multipart/form-data"
                action="" class="atf-contact-form form">
                @csrf
                <div class="row contact-form-row">
                    <div class="col-md-3 col-sm-3 col-12">
                        <label class="contact-form-label text-dark">Name:</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-12">
                        <input type="text" name="name" class="shadow-none form-control contact-form-cls" required>
                    </div>
                </div>
                <div class="row contact-form-row">
                    <div class="col-md-3 col-sm-3 col-12">
                        <label class="contact-form-label">Phone Number:</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-12">
                        <input type="number" name="phone" class="shadow-none form-control contact-form-cls" required>
                    </div>
                </div>
                <div class="row contact-form-row">
                    <div class="col-md-3 col-sm-3 col-12">
                        <label class="contact-form-label">Email Address:</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-12">
                        <input type="text" name="email" class="shadow-none form-control contact-form-cls" required>
                    </div>
                </div>
                <div class="row contact-form-row">
                    <div class="col-md-3 col-sm-3 col-12">
                        <label class="contact-form-label">Request:</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-12">
                        <select name="request" class="form-control contact-form-slc shadow-none" required>
                            <option value="request1">Select a Request *</option>
                            <option value="request2">Select a Request *</option>
                            <option value="request3">Select a Request *</option>
                        </select>
                    </div>
                </div>
                <div class="row contact-form-row">
                    <div class="col-md-3 col-sm-3 col-12">
                        <label class="contact-form-label">Message:</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-12">
                        <textarea cols="4" name="message" rows="7" class="form-control contact-form-txtarea shadow-none" required></textarea>
                        <div class="submit-clr-btn buy-cart d-flex">
                            <button type="submit" class="contact-sub-btn buy rounded-1 fs-6 py-2">Submit</button>
                            <button type="button" class="contact-clr-btn fs-6 py-2">Clear All</button>
                        </div>
                    </div>
                </div>
            </form>
            <p class="need-connect"><strong>Need Decoration?</strong> Give us a call at 1-866-217-1729 or Email us at <a
                    href="javascriptvoid:(0)">decoration@gotapparel.com</a>. Our specialist will get back to you shortly.
            </p>
        </div>
    </section>
    <!-- CONTACT US SECTION END -->
    <!-- QUICK SOLUTION SECTION BEGIN -->
    <section class="quick-solution-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <h4 class="quick-solution-heading">Have a look at our Quick Solutions</h4>
                </div>
            </div>
            <div class="row solutions-cls">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu1.png" alt="image">
                        <h6>Track Order</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu2.png" alt="image">
                        <h6>Return Portal</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu3.png" alt="image">
                        <h6>FAQ's</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu1.png" alt="image">
                        <h6>Return & Exchange</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
            </div>
            <div class="row solutions-cls">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu4.png" alt="image">
                        <h6>Shipping & Delivery</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu5.png" alt="image">
                        <h6>Size Guide</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu6.png" alt="image">
                        <h6>Partnership & Collaboration</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="solutions-boxes">
                        <img src="contact/qu7.png" alt="image">
                        <h6>About Us</h6>
                        <a href="javascriptvoid:(0)">FIND ANSWERS NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--    <div class="container contact_main py-5 px-md-5 mb-4"> --}}
    {{--        <div class="row"> --}}
    {{--            <div class="col-12 text-center mb-3"> --}}
    {{--                <h1 class="fs-1 fw-sm-bold text-light mb-2 text-uppercase" > --}}
    {{--                    @if (request()->is('contact')) --}}
    {{--                    CONTACT US --}}
    {{--                    @else --}}
    {{--                        Advertising Opportunity --}}
    {{--                    @endif --}}
    {{--                </h1> --}}
    {{--                <p class="fs-6 fw-normal text-light"> --}}
    {{--                    CONTACT THE HELP THEM --}}
    {{--                </p> --}}
    {{--            </div> --}}
    {{--            <div class="col-12 "> --}}
    {{--                <div class="form row bg-light  mx-0 shadow_dark"> --}}
    {{--                    <div class="col-lg-6 col-md-6 col-sm-12 p-md-5 p-4 py-5"> --}}
    {{--                        @include('frontend/layouts/error') --}}
    {{--                        <form id="contact-form" action="{{url('post-contact')}}" method="post" enctype="multipart/form-data" action="" --}}
    {{--                              class="atf-contact-form form"> --}}
    {{--                            @csrf --}}
    {{--                            <div data-aos="fade-up"> --}}
    {{--                                <label for="name">Your Name:</label> --}}
    {{--                                <input name="name" id="name" placeholder="Your Name"  class="text-dark rounded-pill" type="text" required   /> --}}
    {{--                            </div> --}}
    {{--                            <div data-aos="fade-up"> --}}
    {{--                                <label for="email">E-Mail Address:</label> --}}
    {{--                                <input name="email" id="email" placeholder="Your E-Mail Address" class="text-dark rounded-pill" type="email" required   /> --}}
    {{--                            </div> --}}
    {{--                            <div data-aos="fade-up"> --}}
    {{--                                <label for="txt">Subject:</label> --}}
    {{--                                <input name="subject" placeholder="Subject" id="txt" class="text-dark rounded-pill" type="text" required   /> --}}
    {{--                            </div> --}}
    {{--                            <div data-aos="fade-up shadow-md"> --}}
    {{--                                <label for="msg">Message:</label> --}}
    {{--                                <textarea name="message"  placeholder="Message" id="msg" --}}
    {{--                                          class="p-4 form-control rounded-4 shadow border-0 border border-muted" required --}}
    {{--                                          style="resize: none;" id="form-contact-message" rows="5" name="message" --}}
    {{--                                ></textarea> --}}
    {{--                            </div> --}}
    {{--                            <div data-aos="fade-up" class="d-flex"> --}}
    {{--                                <button type="submit" --}}
    {{--                                        class="btn read-more-cta px-4 py-2 fs-5 text-uppercase my-4"> --}}
    {{--                                    Submit --}}
    {{--                                </button> --}}
    {{--                            </div> --}}
    {{--                        </form> --}}
    {{--                    </div> --}}
    {{--                    <div class="col-lg-6 col-md-6 col-sm-12 mt-auto pe-0 contact-ig"> --}}

    {{--                        @if (request()->is('contact')) --}}
    {{--                        <img src="{{asset('frontend/img/vector.png')}}" class="w-100" alt="Contact Us "> --}}

    {{--                        @else --}}
    {{--                            <img src="{{asset('frontend/img/advertising.png')}}" class="w-100" alt="Contact Us "> --}}

    {{--                        @endif --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
@endsection


<style>
    label {
        display: none !important;
    }
</style>
