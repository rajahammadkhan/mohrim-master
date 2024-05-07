@foreach($product  as $products)
    <div class="col-md-3 col-sm-6 col-6 padd-rgt my-2">
        <div class="light-border d-flex align-items-center justify-content-between flex-column h-100">
            <div class="h-100 d-flex align-items-center justify-content-between flex-column w-100">

            <div id="featured_img" class="w-100">
                {{--@dd($products)--}}
                @if(isset($products['media'][0]) != null)
                    @php $image = '/'.$products['media'][0]->image;
                    $object = ''
                    @endphp

                @else
                    @php $image = 'galleryimage.png';
                     $object = 'object-fit:cover'
                    @endphp
                @endif
                <img style="{{$object}}" src="{{asset('images/media'.'/'.$image)}}" class="w-100" height="200px">
                {{--                        <img id="img" src="{{asset('frontend/ecommerce/images/jack1.jpg')}}" alt="image">--}}
            </div>
            {{--            <div id="thumb_img" class="cf">--}}
            {{--                <h6>--}}
            {{--                  <span class="active-cls">--}}
            {{--                    <div class="color" style="background-color: #222222" data-hex="222222"></div>--}}
            {{--                  </span>--}}
            {{--                </h6>--}}
            {{--                <h6>--}}
            {{--                  <span>--}}
            {{--                    <div class="color" style="background-color: #66aabc" data-hex="66aabc"></div>--}}
            {{--                  </span>--}}
            {{--                </h6>--}}
            {{--                <h6>--}}
            {{--                  <span>--}}
            {{--                    <div class="color" style="background-color: #555555" data-hex="555555"></div>--}}
            {{--                  </span>--}}
            {{--                </h6>--}}
            {{--                <h6>--}}
            {{--                  <span>--}}
            {{--                    <div class="color" style="background-color: #b9b8b5" data-hex="b9b8b5"></div>--}}
            {{--                  </span>--}}
            {{--                </h6>--}}
            {{--                <h6>--}}
            {{--                  <span>--}}
            {{--                    <div class="color" style="background-color: #36454f" data-hex="36454f"></div>--}}
            {{--                  </span>--}}
            {{--                </h6>--}}
            {{--                <h6>--}}
            {{--                  <span>--}}
            {{--                    <div class="color" style="background-color: #ffb7a5" data-hex="ffb7a5"></div>--}}
            {{--                  </span>--}}
            {{--                </h6>--}}
            {{--                <div class="more-colors"><a href="javascriptvoid:(0)">+4</a></div>--}}
            {{--            </div>--}}
            <h4 class="jacket-heading heading-truncate">
                <a href="{{url('single-product',$products['slug'])}}" class="fs-6 text-dark">
                    {{$products['title']}}
                </a>
            </h4>
            <div class="stars-icon">
                <ul>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                    <li class="number-spacing text-muted list-unstyled">992</li>
                </ul>
            </div>
{{--            @dd($products['currency'])--}}
            <p class="amount-text"><span><small class="text-uppercase">{{$products['currency']->currency_symbol}}</small>{{$products['discounted_price']}}</span>
                <small></small>
                <span class="cut-price text-uppercase">{{$products['currency']->currency_symbol}} {{$products['compare_price']}}</span>
            </p>
        </div>
            <div class="w-100 d-flex align-items-center justify-content-between flex-column">

                <h6 class="promo-text w-100">35% OFF-Save $40.00</h6> 
                <p class="free-shipping-text promo-text bg-white text-center"><a href="{{url('single-product',$products['slug'])}}"> Free Shipping </a></p>
            </div>
        </div>
    </div>

@endforeach
