@if($ThemeSettings('option-blog-view','list'))
<div class="row my-5 blog-list-view">
    <div class="col-md-12">
        <div class="img w-75">
            <img class="w-100" src="{{asset('images/categories/'.$blog->image)}}" alt="">
        </div>
        <div class="content bg-light p-5 shadow text-center">
            <p class="text-purp fs-2 main-heading fw-sm-bold text-start text-truncate">
                {{$blog->title}}
            </p>
            <div class="center d-flex justify-content-between">
                <p class="fs-6 text-muted fw-sm-bold">

                    By Onthe Vouch Last Updated On July 22, 2022
                </p>
                <p class="fs-6 text-purp fw-sm-bold">
                    0 Comments
                </p>
            </div>
            <div class="fs-6 fw-sm-bold text-start para">
                {!! $blog->short_description !!}
            </div>
            <a href="{{url('blog',$blog->slug)}}" class="btn read-more-cta px-5 py-3">
                READ MORE
            </a>
        </div>
    </div>


</div>
@endif







