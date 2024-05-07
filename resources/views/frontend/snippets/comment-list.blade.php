@foreach($data as $row)
<div class="pd_comment_sec my-4 container-fluid px-1">
    <di class="row shadow com_card w-100 mx-auto">
        <div class="col-lg-2 col-md-2 col-sm-2 col-2 px-3 my-auto mx-auto text-end">
            <img src="{{asset('images/comment/'.$ReferenceType.'/'.$row->image)}}" class="w-100 my-4" alt="">
        </div>
        <div class="col-lg-8 col-md-9 col-sm-8 col-8 my-auto py-3">
            <p class="text-purp fs-5 fw-sm-bold">
                V_OR5SGFDD
            </p>
            <p class="text-muted fw-normal fs-10">
                {{$row->comments}}
            </p>
{{--            <div class="pd-foot">--}}
{{--                <div class="foot d-flex align-items-center">--}}
{{--                    <div class="like d-flex align-items-end" id="like">--}}
{{--                        <div class="like" id="like">--}}
{{--                            <img src="assets/img/Path 81.png" class="w-100 like_img" alt="">--}}
{{--                        </div>--}}
{{--                        <p class="px-1 expiry mb-0">12</p>--}}
{{--                        <div class="like mx-3" id="like">--}}
{{--                            <img src="assets/img/Path 81.png"  style="  transform: scaley(-1);" class="w-100 like_img" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-2 my-3 text-muted fw-sm-bold fs-8">{{$row->created_at}}</div>
    </di>
</div>
@endforeach
