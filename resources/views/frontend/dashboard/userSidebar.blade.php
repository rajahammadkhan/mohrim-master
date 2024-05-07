<style>
    .li-links {
        text-align: left !important;
        padding:15px !important;
    }
    .li-links a {
        color: white !important;
        padding:15px !important;
    }
    .li-links.active {
        background: black !important;
    }
</style>
<div style="background: #f89321" class="col-lg-3 col-md-3 col-sm-12 bg-signature  rounded-4 text-center pt-3">
    <div class="top_content px-5">

        <div class="d-flex justify-content-center mb-4">
            <div class="profile-image-outer-container">
                <div class="profile-image-inner-container text-center " style="-color: #d4d4d4;">

                    @if(auth()->user()->image!= null)
                        @php $image = auth()->user()->image @endphp
                    @else
                        @php $image = 'avatar.png' @endphp
                    @endif
                    <img  style="border-radius: 50%;height: 150px;width: 150px" src="{{asset('images/profile'.'/'.$image)}}" alt="{{auth()->user()->image.' Dashboard'}}">
{{--                    <span class="profile-image-button bg-dark">--}}
{{--                                                                        <i style="line-height: unset" class="fas fa-camera text-white"></i>--}}
{{--                                                                    </span>--}}
                </div>
{{--                <input type="file" name="image" id="file" class="profile-image-input">--}}
            </div>
        </div>

{{--        <div class="logo">--}}
{{--            <img src="{{asset('frontend/img/logo.png')}}" class="w-100" alt="">--}}
{{--        </div>--}}
        {{--                    <h4 class="text-light mt-4">Rules</h4>--}}
        {{--                    <h5 class="fw-light text-start mt-3 following text-light">Following: <span class="ms-4"--}}
        {{--                                                                                               id="following">0</span></h5>--}}
        {{--                    <h5 class="fw-light text-start mt-3 followers text-light">Followers: <span class="ms-4"--}}
        {{--                                                                                               id="followers">0</span></h5>--}}
    </div>
    <div class="row p-0 mt-3 rounded-4 ">
        <div class="col-12 px-0">
            <h5 class="mb-0 py-3 fw-sm sm-shadow text-capitalize">
                {{auth()->user()->name}}
            </h5>
            <div class="links text-start">
                <ul class="m-0 pb-5">
                    {{--                                <li class="list-unstyled li-links py-2"><a href="#"--}}
                    {{--                                                                           class="fs-5 list-links text-decoration-none active"><img--}}
                    {{--                                                src="{{asset('frontend/img/icons/1.png')}}" alt="Icon" class="ico me-3"> Deal Requested</a>--}}
                    {{--                                </li>--}}
                    <li class="list-unstyled li-links py-2 {{ (request()->is('wishlist')) ? 'active' : '' }}">
                        <a href="{{'wishlist'}}" class="fs-5 list-links text-decoration-none ">
                            <i class="fa fa-heart" aria-hidden="true"></i> Wishlist</a></li>

                    <li class="list-unstyled li-links py-2 {{ (request()->is('my-activity')) ? 'active' : '' }}">
                        <a href="{{url('my-activity')}}" class="fs-5 list-links text-decoration-none ">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            My activity</a></li>

                    <li class="list-unstyled li-links py-2 {{ (request()->is('my-order')) ? 'active' : '' }}">
                        <a href="{{url('my-order')}}" class="fs-5 list-links text-decoration-none">
                            <i class="fa fa-first-order" aria-hidden="true"></i> My Order</a>
                    </li>

                    <li class="list-unstyled li-links py-2 {{ (request()->is('my-profile')) ? 'active' : '' }}">
                        <a href="{{url('my-profile')}}" class="fs-5 list-links text-decoration-none">
                            <i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                    </li>
                    <li class="list-unstyled li-links py-2 {{ (request()->is('change-password')) ? 'active' : '' }}">
                        <a href="{{url('change-password')}}" class="fs-5 list-links text-decoration-none">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    /*.links{*/
    /*    border-right: 7px solid #3b589d;*/
    /*}*/
    /*.links li.active a {*/
    /*    color: #38c4ca !important;*/
    /*}*/
    ul#myTab button {
        background: #38c4ca !important;
        color: white;
        border-radius: 30px;
        padding: 10px 29px;
    }
</style>
