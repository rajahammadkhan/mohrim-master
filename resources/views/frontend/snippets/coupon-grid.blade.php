@if($ThemeSettings('option-coupon-view','grid'))

<div class="col-lg-{{$column}} col-md-6 col-sm-6 col-12 px-2 mb-3 product-grid">
<?php
    $image = isset($coupons['media'][0]->image) ? $coupons['media'][0]->image : 'galleryimage.png' ;
    ?>
    <div class="  p-2 product-item position-relative active bg-white" data-type="coupon" data-id="{{base64_encode($coupons['basic']->id)}}">
        <div class="pd-img text-center"> <img src="{{asset('images/media/'.$image)}}" class="w-75" alt="{{$coupons['basic']->title.' '.$coupons['basic']->coupon_type.rand(10,120000)}} ">
        </div>
        <div class="position-relative">
            <div class="decoration">
                <div class="line"></div>
                <div class="ball">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="pd-content pt-3 mt-4">
{{--            <a href="{{url('single-coupons',$coupons['basic']->slug)}}">--}}
            <div class="fw-bold text-purp Heading text-truncate m-0">
                    {{ \Illuminate\Support\Str::limit($coupons['basic']->title, 40, $end='...') }}
            </div>
{{--            </a>--}}
            <div >
<img width="20px" src="{{asset('flags/'.strtolower($SelectedCountry()->iso).'.svg')}}" alt="{{$SelectedCountry()->iso}}">
{{--             <a class="text-dark" href="{{url('collection/show',$coupons['category']->id)}}"> --}}
                 <small style="font-size:12px;"> {{$coupons['category']  != null ? $coupons['category']->title : ''}} </small>
{{--             </a>--}}
            </div>

{{--            {{$coupons['basic']->compare_price}}--}}

            <p class="price mb-0">
<span class="old_price pe-2 text-dark">
<strike>
${{$coupons['basic']->compare_price}}
</strike>
</span>
                @if($coupons['basic']->discount != null )
                <span class="badge bg-signature rounded-0">
-{{$coupons['basic']->discount}}%
</span>
                @endif
                <span class="fs-6 fw-bold text-danger float-end">
${{$coupons['basic']->regular_price}}
</span>
            </p>
        </div>
        <div class="pd-foot">

            <div class="foot d-flex align-items-center">
                {{$LikeWidget('coupon',$coupons['basic']->id)}}
                <div class="comment d-flex align-items-end ms-3">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7,7A1,1,0,1,0,8,8,1,1,0,0,0,7,7Zm0,4a1,1,0,1,0,1,1A1,1,0,0,0,7,11Zm10,0H11a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm0-4H11a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm2-5H5A3,3,0,0,0,2,5V15a3,3,0,0,0,3,3H16.59l3.7,3.71A1,1,0,0,0,21,22a.84.84,0,0,0,.38-.08A1,1,0,0,0,22,21V5A3,3,0,0,0,19,2Zm1,16.59-2.29-2.3A1,1,0,0,0,17,16H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1Z"></path>
                        </svg>
                    </a>
                    <p class="px-2 expiry mb-0">{{$coupons['comment']}}</p>
                </div>
            </div>
        </div>


        <div class="overlay-pd text-right p-3">
            <div class="row d-flex align-items-center">
                <div class="col-8">
                    @if($coupons['basic']->coupon_type == 'coupon')
                    <a href="{{url('get-code',base64_encode($coupons['basic']->id))}}" class="btn coupon-cta">Get Coupon</a>
                     @endif
                </div>
                <div class="col-4 d-flex justify-content-end">
                    {{$WishList('coupon',$coupons['basic']->id)}}
                </div>
            </div>
                    <a href="{{url('single-coupons',$coupons['basic']->slug)}}" class="view-detail-cta text-white fs-6">View Detail >></a>
        </div>
    </div>
</div>


@endif
