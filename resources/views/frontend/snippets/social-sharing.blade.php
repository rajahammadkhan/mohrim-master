<style>
    .share {
        position: absolute;
        color: rgb(255, 255, 255);
        overflow: hidden;
        /* border-radius: 5rem; */
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        transition: .3s all;
        background-color: #38c4ca;
        top: -30px;
    }

    .share:hover {
        box-shadow: unset;
        background-color: transparent;
    }

    .share span {
        display: inline-block;
        text-transform: uppercase;
        position: absolute;
        left: 50%;
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
        pointer-events: none;
        transform: translateX(-50%);
        font-size: 20px;
        font-weight: 500;
    }

    .share nav {
        font-size: 0;
    }

    .share a {
        line-height: 45px;
        width: 35px;
        text-align: center;
        display: inline-block;
        color: #fff;
        overflow: hidden;
        opacity: 1;
        transition: all 0.3s ease-in-out;
        margin: 0 -14px;
    }

    .share:hover a {
        width: 45px;
    }

    .share a:nth-child(1) {
        border-top-left-radius: 40px;
        border-bottom-left-radius: 40px;
        margin-left: 0;
    }

    .share a:nth-child(1):hover {
        background-color: #61c5ec;
    }

    .share a:nth-child(2):hover {
        background-color: #3b5998;
    }

    .share a:nth-child(5):hover {
        background-color: #ea4335;
    }

    .share a:nth-child(6):hover {
        background-color: #b92b27;
    }

    .share a:nth-child(3):hover {
        background-color: #E4405F ;
    }

    .share a:nth-child(4) {
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        margin-right: 0;
    }

    .share a:nth-child(4):hover {
        background-color: #128c7e;
    }


    .share:hover span,
    .share.hover span {
        opacity: 0;
    }

    .share:hover a,
    .share.hover a {
        border-radius: 50%;
        margin: 0 4px;
        color: #38c4ca;
        font-size: 20px;
    }

    .share:hover a:hover,
    .share.hover a:hover {
        color: #fff;
    }

    .secShare {
        position: relative;
    }
</style>
<div class="social_profile ms-3 my-0">
    <div class="secShare">
        <div class="share py-2">
            <span><i class="fa-solid fa-share-nodes"></i></span>
            <nav class="d-flex">
                <a href="https://twitter.com/intent/tweet?url={{url()->current()}}"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i
                            class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com//?{{url()->current()}}"><i class="fa fa-instagram"></i></a>
                <a href="https://api.whatsapp.com/?{{url()->current()}}"><i class="fa fa-whatsapp"></i></a>
                <a href="http://www.reddit.com/submit?url={{url()->current()}}"><i class="fa fa-reddit"></i></a>
{{--                <a href="https://qr.ae/pvOjGn"><i class="fa fa-quora"></i></a>--}}
            </nav>
        </div>
    </div>
</div>
