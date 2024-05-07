<div class="wishlist like-container d-fle align-items-center btn bg-white">
    <div class="heart like-reaction text-center"  data-reaction="wishlist" data-type="{{$ReferenceType}}" data-id="{{$ReferenceId}}">


        <img src="{{count($already) == 0 ? asset('frontend/img/Icon feather-heart.png') : asset('frontend/img/active0.png')}}" class="w-75 heart_img {{count($already) == 0 ? '' : 'active'}}" alt="Wishlist">

{{--        <img src="https://eliteblue.net/Clients/viys/coupon/public/frontend/img/Icon feather-heart.png" class="w-75 heart_img" alt="">--}}
    </div>
</div>
