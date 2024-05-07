<footer class="footer pb-0 pt-5">
    <div class="footer">
        <div class="container">
            
{{--            <div class="top_footer row">--}}
{{--                <div class="col-md-4 col-xsm-12 sm-my-3 text-center">--}}
{{--                    <div class="f_logo">--}}
{{--                        <img src="{{asset('frontend/img/f_logo.png')}}" class="w-75" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-8 col-xsm-12 d-flex align-items-end my-4">--}}
{{--                    <p class="fs-2 text-light fw-bold">THE EASIEST WAY TO SAVE THE INTERNET</p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row main_footer my-sm-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_footer">
                        <h4>ABOUT</h4>
                        <ul>
{{--                            <li><a href="{{url('page/about-us')}}">What is {{config('app.name')}}</a></li>--}}
                            <li><a href="{{url('page/faq')}}">FAQ</a></li>
{{--                            <li><a href="">Seller Affiliates </a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_footer">
                        <h4>{{config('app.name')}} SELLER</h4>
                        <ul>
{{--                            <li><a href="#">Seller Center</a></li>--}}
                            <li><a href="{{url('advertising')}}">Advertising Opportunities</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="single_footer single_footer_address">
                        <h4>CONTACT US</h4>
                        <ul>


                            <li><a href="mailto:info@onthevouch.com">info@onthevouch.com</a></li>
                            <li><a href="mailto:sales@onthevouch.com">sales@onthevouch.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                 {{$Snippet('newsletter')}}
                    <div class="social_profile">
                        <ul>
                            <li><a href="https://www.instagram.com/onthevouch/"><i class="fab fa-instagram"></i></a></li>
{{--                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
                            <li><a href="https://www.facebook.com/Onthevouch-107961582032451/"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row bg-signature copyright-tag">
            <div class="col-12 text-center py-2">
                <h6 class="text-light m-0">
                    © Copyright 2022 | All Rights Reserved | Powered By <a href="https://www.inowmarketing.com/" target="_blank">INOWMARKETING</a>
                </h6>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script defer  src="https://kit.fontawesome.com/20b4506959.js" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

{{--<script src="{{asset('frontend/script/script.js')}}"></script>--}}
@include('frontend/script')

<script>
    $(document).ready(function () {
        $(document).on('click', '.like-reaction', function () {
            var likeaction = $(this);
            if ($(this).find('img').hasClass('active')) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('post-like')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: $(this).data('id'),
                        type: $(this).data('type'),
                        reaction: $(this).data('reaction'),
                    },
                    dataType: "json",
                    beforeSend: function () {
                        $(".ajaxpreload").show();
                    },
                    success: function (data) {
                        console.log(data);
                        if(data != false){
                            $(likeaction).parents('.like-container').find('.like-count').text(data);

                        }else{
                            window.location.href = '{{url('login')}}';

                        }
                    }
                });

            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{url('post-dislike')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: $(this).data('id'),
                        type: $(this).data('type'),
                        reaction: $(this).data('reaction'),
                    },
                    dataType: "json",
                    beforeSend: function () {
                        $(".ajaxpreload").show();
                    },
                    success: function (data) {
                        if(data != 'ffalse'){

                            $(likeaction).parents('.like-container').find('.like-count').text(data);
                    }else{
                        window.location.href = '{{url('login')}}';

                    }
                    }
                });
            }

        });
    });


    $(".product-item").click(function () {
        if ($(this).hasClass("active")) {
            $(".product-item").removeClass("active");
        } else {
            $(".product-item").removeClass("active");
            $(this).addClass("active");
        }
    });



</script>

<script type="text/javascript">
    $(document).ready(function () {
        /* When click show user */
        $('body').on('input', '.show-user', function () {
            var word = $(this).val();
            $.ajax({
                url:"{{url('SearchKeyword') }}",
                type: "GET",
                data:{
                    _token:'{{ csrf_token() }}',
                    keyword:word
                },
                contentType:'application/json',
                success: function(data){
                    jQuery.each(data, function(index, item) {
                        $('ul').html(`<li>${item.title}</li>`);
                    });
                    console.log(data);
                }
            });
        });
    });
    $('body').on('click', '.searchbar li', function () {
        $(this).parents('.searchbar').find('input').val($(this).text());
        $('.search-btn ').click();
    });
</script>

</body>

</html>
