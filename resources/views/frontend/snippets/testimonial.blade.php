<?php

  $data =  DB::table('testimonials')->where('status',1)->get();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js">

</script>

<h2 class="text-uppercase text-center mt-5 mb-0 fs-3 MainHeading fw-sm-bold">
    What Our User Says
</h2>
<div class="carousel-wrap testimonial my-5" >

    <div class="owl-carousel">
        @foreach($data as $row)

            <?php
            $image =  DB::table('media')->where('reference_id',$row->id)->where('reference_type','testimonial')->get()->first();

            ?>

        <div class="item">
            <div class=" border-0">
                <div class="row">
                    <div class="col-12 ">
                        <div class="row d-flex align-items-center py-3 justify-content-center">
                            <div class="col-3">
                                @if($image == null)
                                    <div style="height:70px;width: 70px;border-radius: 50%;background: #00000078">
                                    </div>
                                @else
                                    <img style="height:70px;width: 70px;border-radius: 50%" src="{{asset('images/testimonial/'.$image->image)}}" alt="{{$row->name}}">
                                @endif
                            </div>
                            <div class="col-9">
                                <h5 class="m-0">{{$row->name}}</h5>
                                <div class="m-0"><small>{{$row->designation}}</small></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="card p-3 rounded-0">
                            <p>{!! $row->comment !!}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            @endforeach
         </div>
</div>


<style>
    .carousel-wrap {
        margin: 90px auto;
        padding: 0 5%;
        width: 100%;
        position: relative;
    }

    /* fix blank or flashing items on carousel */
    .owl-carousel .item {
        position: relative;
        z-index: 100;
        -webkit-backface-visibility: hidden;
    }

    /* end fix */
    .owl-nav > div {
        margin-top: -26px;
        position: absolute;
        top: 50%;
        color: #cdcbcd;
    }

    .owl-nav i {
        font-size: 52px;
    }

    .owl-nav .owl-prev {
        left: -30px;
    }

    .owl-nav .owl-next {
        right: -30px;
    }
    .testimonial .card {
        background: #e6e9ec;
        border: 0;
        font-style: italic;
        font-size: 14px;
    }
</style>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
</script>







