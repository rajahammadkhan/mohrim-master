@extends('frontend.layouts.master')
@section('title')
    testing - {{config('app.dashboard')}}
@endsection
@section('content')

    <div class="container main-blog">
        <div class="row my-5 blog-list-view">
            <div class="col-md-12 position-relative p-0" style="height: 220px;">
                <div class="overlay-title text-uppercase">
                    <h1>TESTING</h1>
                </div>
            </div>
        </div>
        <div class="row my-5 blog-list-view">
            <div class="col-md-12">
                <h2 class=" fs-2 main-heading fw-sm-bold text-start text-truncate">
                </h2>
                <p class="fs-6 text-muted fw-sm-bold">
                </p><div class="fs-6 fw-sm- text-start para long-description-box">
                    <form action="{{url('testing-post')}}"  method="POST" enctype="multipart/form-data">





                        @csrf

                        <input name="image[]" type="file" multiple>



                        <button class="btn btn-primary" type="submit"> Hit yahan maro</button>
                    </form>



                </div>
        </div>
    </div>




@endsection

