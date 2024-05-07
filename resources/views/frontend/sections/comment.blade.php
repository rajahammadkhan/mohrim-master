@if($ThemeSettings('option-coupon-comments','on'))
    @auth
        <section>
            <div class="pd_comment_sec my-4 bg-purp d-flex justify-content-center">
                <div class="row container">
                    <div class="col-12 bg-purp w-100 py-3 text-light fs-5">COMMENTS</div>
                </div>
            </div>
            {{$CommentBox('coupon',1)}}
            {{$CommentList('coupon',1)}}
        </section>
    @endauth
@endif
@guest
    <div class="container login-container my-3">
        <div class="row">
            <div class="col-12">
                <div class="shadow p-3 px-4 d-flex justify-content-between">
                    <div class="row w-100">
                        <div
                                class="col-lg-8 col-md-8 col-12 left-content d-flex justify-content-center align-items-center">
                            <div class="img">
                                <img src="assets/img/Group 215.png" alt="">
                            </div>
                            <p class="fs-6 mb-0 mx-4">
                                <a href="/login">Log in</a> or
                                <a href="/login">Sign up</a> for a ONEVOUCH account to post comment.
                            </p>
                        </div>
                        <div
                                class="right-content col-lg-4 col-md-4 col-12 d-flex  justify-content-center align-items-center">
                            <div class="btns d-flex">
                                <div class="login mx-1">
                                    <button
                                            class="login_btn btn shadow-none border-0 outline-none px-3 py-2 rounded-pill">Log
                                        in</button>
                                </div>
                                <div class="signup">
                                    <button
                                            class="signup_btn btn shadow-none border-0 outline-none px-3 py-2 rounded-pill">Sign
                                        up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest


