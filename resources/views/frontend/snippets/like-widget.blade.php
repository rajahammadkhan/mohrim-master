<div class="like-container d-flex align-items-center btn bg-white p-0" >
    <div class="like like-reaction" data-reaction="like" data-type="{{$ReferenceType}}" data-id="{{$ReferenceId}}">

        <img src="{{count($already) == 0 ? asset('frontend/img/Path 81.png') : asset('frontend/img/filled.png')}}" class="w-75 like_img {{count($already) == 0 ? '' : 'active'}}" alt="Like">
    </div>
    <p class="px-1 expiry like-count mb-0">{{count($data)}}</p>
</div>





