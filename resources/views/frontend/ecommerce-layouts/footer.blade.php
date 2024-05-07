<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-12">
                <div class="footer-listing">
                    <h6>Customer Care</h6>
                    <ul>
                        <li><a href="{{url('page/about-us')}}" class="btn-quick-links">Track Order</a></li>
                        <li><a href="{{url('page/return-request')}}" class="btn-quick-links">Return Request</a></li>
                        <li><a href="{{url('page/faqs')}}">FAQs</a></li>
                        <li><a href="{{url('page/shipping-delivery')}}">Shipping & Delivery</a></li>
                        <li><a href="{{url('page/returns-exchanges')}}">Returns & Exchanges</a></li>
                        <li><a href="{{url('page/size-guide')}}">Size Guide</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-12">
                <div class="footer-listing">
                    <h6>Need Assistance</h6>
                    <ul>
                        <li><a href="{{url('contact-us')}}" class="btn-quick-links">Contact Us</a></li>
                        <li><a href="{{url('feedback')}}" class="btn-feedback-links">Share your Feedback</a></li>
                        <li><a href="#">Free Shipping in the USA, UK, and Canada</a></li>
                        <li><a href="#">Expedited Delivery in Australia, New Zealand, Germany, France, Italy, Europe, China, and World Wide.</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-12">
                <div class="footer-listing">
                    <h6>About Us</h6>
                    <ul>
                        <li><a href="{{url('page/sustainable-leather')}}">Sustainable Leather</a></li>
                        <li><a href="{{url('page/why-buy-from-us')}}">Why Buy From Us</a></li>
                        <li><a href="{{url('page/who-we-are')}}">Who We Are</a></li>
                        <li><a href="{{url('page/fjackets-family')}}">FJackets Family</a></li>
                        <li><a href="{{url('page/press-mentions')}}">Press & Mentions</a></li>
                        <li><a href="{{url('page/giveaway-men-women')}}">Giveaway Men | Women</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-12">
                <div class="footer-listing">
                    <h6>Explore</h6>
                    <ul>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                        <li><a href="javascriptvoid:(0)">Embriodery</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-12">
                <div class="footer-listing">
                    <h6>Locate Us</h6>
                    <ul class="add-txt">
                        <li><span>US Head Office:</span> 1178 Broadway 3rd Floor #1171 New York, NY 10001 United States</li>
                        <li><span>UK Sales Office:</span> 56, West Wood Road, Essex, London England UK IG3 8RZ</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-12">
                <div class="secure-img">
                    <a href="javascriptvoid:(0)"><img src="{{asset('frontend/ecommerce/images/c1.png')}}" alt="image" class="img-fluid"></a>
                </div>
                <div class="payment-methods">
                    <a href="javascriptvoid:(0)"><img src="{{asset('frontend/ecommerce/images/c2.png')}}" alt="image" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER SECTION END -->
<!-- COPY RIGHT SECTION BEGIN -->
<section class="copy-right-sec">
    <div class="container">
        <div class="row">
{{--            <div class="col-md-12 col-sm-12 col-12">--}}
{{--                <p>Copyright 2007-2021 GotApparel.com. All Rights Reserved. Site Designed & Maintained by AmPak International <span><strong>Note:</strong>Please contact webmaster@gotapparel.com for any errors or missing links.</span></p>--}}
{{--            </div>--}}
            <div class="col-md-12 col-sm-12 col-12">
                <p class="text-uppercase">
                    © Copyright 2022 | All Rights Reserved | Powered By <a href="//eliteblue.net" target="_blank" class="text-uppercase text-dark">eliteblue technologies</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- COPY RIGHT SECTION END -->
<!-- Latest compiled JavaScript -->
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
></script>
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="{{asset('frontend/ecommerce/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/ecommerce/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/ecommerce/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/ecommerce/js/jquery.fancybox.min.js')}}"></script>



<script>
    new WOW().init();
</script>
<script>
    function changeimg(url,e) {
        document.getElementById("img").src = url;
        let nodes = document.getElementById("thumb_img");
        let img_child = nodes.children;
        for (i = 0; i < img_child.length; i++) {
            img_child[i].classList.remove('active')
        }
        e.classList.add('active');
    }
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            placement: 'top',
            trigger: 'hover'
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(window).resize(function(){
            if ($(window).width() >= 980){
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show");
                });
                $( ".navbar .dropdown-menu" ).mouseleave(function() {
                    $(this).removeClass("show");
                });
            }
        });
    });
</script>
<script>
    function custom_ajax(formid, result, event) {
        var form = $(formid)[0];
        var modal = $(form).parents('.modal');
        // console.log(form);
        // console.log(modal);
        event.preventDefault();
        var data = new FormData($(formid)[0]);
        console.log(data);
        $.ajax({
            processData: false,
            contentType: false,
            data: data,
            type: $(formid).attr('method'),
            url: $(formid).attr('action'),
            beforeSend: function () {
                // Show image container

                $(".ajax_load").html('<img src="{{asset('frontend/ZNeT.gif')}}">');

            },
            success: function (data) {
                alert('Your product are added to cart');
                //console.log( "the feedback from your API: " + data );

                // if(data == 1){
                //     // $(modal).modal('hide');
                //     // $('.refresh').click();
                //     // $(".ajax_load").hide();
                //
                //     $('.error').html(data);
                // }
                // else{
                //
                //
                // }
            },
            complete: function (data) {
                // Hide image container
                $(".ajax_load").empty();
            }

        });
    }
</script>
</body>
</html>
