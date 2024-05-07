@if($ThemeSettings('option-coupon-view','list'))
    <div class="col-12 shadow p-2 my-3">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-3 my-auto">
            <img src="" alt="product" class="w-100">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6 px-4 my-2">
            <p class="text-purp fw-bold truncate">
                <a href="">
              Product Title
                </a>
            </p>
            <p class="price mb-0">
                                    <span class="old_price pe-2">
                                        <strike>
                                           $80
                                        </strike>
                                    </span>
                <span class="fs-6 fw-bold text-purp">
                                        $120
                                    </span>
            </p>
            <div class="pd-foot">
                <p class="expiry mb-0 my-2">
                    Listing Expires in
                    <span class="text-danger fw-bold">
                                            2 days
                                        </span>
                </p>
                <div class="foot d-flex align-items-center">
{{--                    {{$LikeWidget('coupon',1)}}--}}
                    <div class="comment d-flex align-items-end ms-3">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path d="M7,7A1,1,0,1,0,8,8,1,1,0,0,0,7,7Zm0,4a1,1,0,1,0,1,1A1,1,0,0,0,7,11Zm10,0H11a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm0-4H11a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm2-5H5A3,3,0,0,0,2,5V15a3,3,0,0,0,3,3H16.59l3.7,3.71A1,1,0,0,0,21,22a.84.84,0,0,0,.38-.08A1,1,0,0,0,22,21V5A3,3,0,0,0,19,2Zm1,16.59-2.29-2.3A1,1,0,0,0,17,16H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1Z"></path>
                            </svg>
                        </a>
                        <p class="px-2 expiry mb-0">10</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative full-w d-flex justify-content-end align-items-center my-3">
            <div class="wishlist">
                <div class="heart" id="heart">
                    <img src="assets/img/Icon feather-heart.png" class="w-75 heart_img" alt="">
                </div>
            </div>
            <div class="get-codebtn-holder">
                <div class="offer-get-code-link cpnbtn">
                    <span class="code coupon-code">XXXXXXX</span>
                    <a class="peel-btn btn-coupon">SEE COUPON </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
