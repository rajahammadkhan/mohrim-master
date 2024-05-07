@if($coupon)
    @foreach($coupon as $coupons)
            @include('frontend/snippets/coupon-grid')
            @include('frontend/snippets/coupon-list')
        @endforeach
@else
    <div class="col-lg-12 col-md-6 col-sm-12 p-5">
        <h3 class="text-center">
            No Coupon Found
        </h3>
    </div>
@endif
