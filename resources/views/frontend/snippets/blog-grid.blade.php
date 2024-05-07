@if($ThemeSettings('option-blog-view','grid'))


<div class="col-lg-10 col-md-10 col-sm-10 col-12 mx-auto  my-4 blog-grid-view" >
    <div class="main shadow ">

        <div class="">

            <?php
            $image = isset($blog['image']) ? $blog['image'] : 'galleryimage.png' ;

            ?>
            <img class="w-100" src="{{asset('images/blog/'.$image)}}" alt="{{$blog['title']}}">
        </div>
        <div class=" bg-light p-3">
            <a href="{{url('blog',$blog['slug'])}}" >

            <h1 class=" fs-2 main-heading fw-sm-bold text-dark text-start text-truncat">
                {{$blog['title']}}
            </h1>
            </a>
            <div class="center d-flex justify-content-between">
                <p class="fs-12 text-muted fw-sm-bold">
                    By {{config('app.name')}}
                </p>
                <p class="fs-12 fw-sm-bold">
                    {{date('F d, Y', strtotime($blog['created_at']))}}

                </p>
            </div>
            <div class="fs-6 fw-normal text-start para truncat mb-3">
                {!! $blog['short_description'] !!}
            </div>
            <a href="{{url('blog',$blog['slug'])}}" class="btn read-more-cta px-4 py-2 fs-12">
                READ MORE
            </a>
        </div>
    </div>

</div>
@endif
