

@if($coupon)
    @foreach($coupon as $coupons)
        <?php
        $image = isset($coupons['media'][0]->image) ? $coupons['media'][0]->image : 'galleryimage.png' ;
        ?>

        <div class="row border-bottom py-2 w-100 mx-auto">
            <div class="col-lg-4 col-md-4 col-sm-4 col-4 my-auto">
                <div class="side-pd-img">
{{--                    <a class="text-dark" href="{{url('coupons',$coupons['basic']->slug)}}">--}}

                    <img src="{{asset('images/media/'.$image)}}?v={{rand(10,140000)}}" class="w-100" height="60px" style="    background: white;object-fit:contain" alt="{{$coupons['basic']->title}} hot Deal">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-8 my-2">

                <div class="side-pd-content">
                    <a class="text-dark" href="{{url('single-coupons',$coupons['basic']->slug)}}">

                    <p class=" side-text my-2 mb-0" style="font-weight: 700;">
                        {{ \Illuminate\Support\Str::limit($coupons['basic']->title, 50, $end='...') }}
                    </p>
                    </a>
{{--                    {{$LikeWidget('coupon',$coupons['basic']->id)}}--}}

                    {{--                    <div class="like text-end me-3" id="like">--}}
{{--                        <img src="{{asset('frontend/img/Path 81.png')}}" style="width: 15px;" class="like_img" alt="">--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-lg-12 col-md-6 col-sm-12 p-5">
        <h3 class="text-center">
            No Coupon Found
        </h3>
    </div>
@endif


