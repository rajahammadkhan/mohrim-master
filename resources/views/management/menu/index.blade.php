@extends('management.layouts.master')
@section('title')
    {{--    {{base64_decode($bl)}}--}}
@endsection
@section('content')

    @include ('management/styling')


    <?php
    if(isset($_GET['menuz'])){
        $selectid = $spec->id;
    }else{
        $selectid = null;
    }

    ?>





    <div class="container-fluid px-4 pb-5">
        <div class="row my-3 mainNestedMenu">
            <div class="col-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">Menu structure </h4>
                    </li>
                </ul>
                <div class="card mb-5 p-3 px-4" >
                    <div class="menuHead">
                        Select a menu to edit:
                        <form action="{{route('menu.show',1)}}" method="get" class="d-inline-block">
                            @csrf
                            <select class="form-control w-auto d-inline-block select2 mx-3" name="menuz"
                                    data-placeholder="Select">
                                <option selected="unselected" disabled>Choose menu</option>
                                @foreach($menu as $men)
                                <option value="{{$men->id}}" {{$men->id==$selectid?'selected':''}}>
                                    {{$men->menu_name}}
                                </option>
                                @endforeach
{{--                                <option value="menu2">--}}
{{--                                    Menu Two--}}
{{--                                </option>--}}
                            </select>
                            <button class="btn btn-primary me-3" type="submit"> Select</button>
                        </form>
                        or <a href="javascript:void(0)" id="showCreateMenu"> create a new menu.</a> Do not forget to save your changes!
                    </div>
                </div>
                <div class="card mb-5 p-3 px-4" id="createMenuMain">
                    <div class="createMenuHead">
                        <form action="{{route('menu.store')}}" method="post" class="d-flex justify-content-between align-items-center">
                            <h5> Create Menu
                            </h5>
                            @csrf
                            <input type="text" name="menu_name" class="form-control w-75 mx-4">
                            <button class="btn btn-primary me-3" type="submit"> Create</button>
                        </form>
                        <p class="w-100">Give your menu a name, then click Create Menu.</p>
                        <a href="javascript:void(0)" class="mt-2" id="hideCreateMenu">Cancel</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h5 class="page-title">Add menu items </h5>
                    </li>
                </ul>

                    <div class="card acc w-100 overflow-hidden mb-3 {{$selectid!=null ? '' : 'menuDisabled'}}">
                        <div class="menu-editor px-2 p-4" id="menu-editor">
                            <h5>Edit <span id="currentEditName" class="currentEditName"></span></h5>
                            <div class="form-group mt-3">
                                <label for="addInputName">Name</label>
                                <input type="text" class="form-control editInputName" id="editInputName"
                                       placeholder="Enter Item Name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="addInputSlug">Slug</label>
                                <input type="text" class="form-control editInputSlug" id="editInputSlug"
                                       placeholder="Enter Slug Name">
                            </div>
                            <button class="btn btn-primary editButton mb-3">Edit</button>
                        </div>
                        <div class="accordion bg-white rounded-3" id="accordionExample">
                            <div id="accordion" class="fir_acc_item">
                                <div class="card acc">
                                    <a class="card-link card-header text-dark" data-toggle="collapse" href="#collapseThree"
                                       aria-expanded="false">
                                        Pages
                                    </a>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="first_tab">
                                                <div id="find-table">
                                                    <div class="lis overflow-auto mb-3">
                                                        @foreach($pages as $pag)
                                                            <div class="form-check">
                                                                <label class="d-block">
                                                                    <input value="{{$pag->title}}" type="checkbox"
                                                                           class="is_variant pages_checkbox items"
                                                                           data_slug="{{$pag->slug}}" name="is_variant">
                                                                    <span>
                                                    {{$pag->title}}
                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        {{--                                                    <div class="form-check">--}}
                                                        {{--                                                        <label class="d-block">--}}
                                                        {{--                                                            <input value="About" type="checkbox"--}}
                                                        {{--                                                                   class="is_variant pages_checkbox items"--}}
                                                        {{--                                                                   data_slug="About_slug" name="is_variant">--}}
                                                        {{--                                                            <span>--}}
                                                        {{--                                                    About--}}
                                                        {{--                                                </span>--}}
                                                        {{--                                                        </label>--}}
                                                        {{--                                                    </div>--}}
                                                        {{--                                                    <div class="form-check">--}}
                                                        {{--                                                        <label class="d-block">--}}
                                                        {{--                                                            <input value="Contact" type="checkbox"--}}
                                                        {{--                                                                   class="is_variant pages_checkbox items"--}}
                                                        {{--                                                                   data_slug="Contact_slug" name="is_variant">--}}
                                                        {{--                                                            <span>--}}
                                                        {{--                                                    Contact--}}
                                                        {{--                                                </span>--}}
                                                        {{--                                                        </label>--}}
                                                        {{--                                                    </div>--}}

                                                    </div>
                                                    <div class="footer d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-primary fs-6 px-2 py-1">Add to
                                                            menu
                                                        </button>
                                                        <div class="form-check">
                                                            <label class="d-block">
                                                                <input type="checkbox"
                                                                       class="is_variant checkAll" name="checkAll">
                                                                <span>
                                                    Check All
                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card acc">
                                    <a class="card-link card-header text-dark" data-toggle="collapse" href="#collapseFour"
                                       aria-expanded="false">
                                        Custom Page
                                    </a>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="first_tab">
                                                <form class="form-inline" id="menu-add">
                                                    <h5 class="text-dark">Add new menu item</h5>
                                                    <div class="form-group">
                                                        <label for="addInputName">Name</label>
                                                        <input type="text" class="form-control" id="addInputName"
                                                               placeholder="Item name"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="addInputSlug">Slug</label>
                                                        <input type="text" class="form-control" id="addInputSlug"
                                                               placeholder="item-slug"
                                                               required>
                                                    </div>
                                                    <button class="btn btn-primary mt-3" id="addButton">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card acc">
                                    <a class="card-link card-header text-dark" data-toggle="collapse" href="#collapsefive"
                                       aria-expanded="false">
                                        Brand
                                    </a>
                                    <div id="collapsefive" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="first_tab">
                                                <div id="find-table">
                                                    <div class="lis overflow-auto mb-3">
                                                        @foreach($brand as $bran)
                                                            <div class="form-check">
                                                                <label class="d-block">
                                                                    <input value="{{$bran->title}}" type="checkbox"
                                                                           class="is_variant pages_checkbox items"
                                                                           data_slug="{{$bran->slug}}" name="is_variant">
                                                                    <span>
                                                    {{$bran->title}}
                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="footer d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-primary fs-6 px-2 py-1">Add to
                                                            menu
                                                        </button>
                                                        <div class="form-check">
                                                            <label class="d-block">
                                                                <input type="checkbox"
                                                                       class="is_variant checkAll" name="checkAll">
                                                                <span>
                                                    Check All
                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card acc">
                                    <a class="card-link card-header text-dark" data-toggle="collapse" href="#collapseSix"
                                       aria-expanded="false">
                                        Store
                                    </a>
                                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="first_tab">
                                                <div id="find-table">
                                                    <div class="lis overflow-auto mb-3">
                                                        @foreach($store as $stor)
                                                            <div class="form-check">
                                                                <label class="d-block">
                                                                    <input value="{{$stor->title}}" type="checkbox"
                                                                           class="is_variant pages_checkbox items"
                                                                           data_slug="{{$stor->slug}}" name="is_variant">
                                                                    <span>
                                                    {{$stor->title}}
                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="footer d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-primary fs-6 px-2 py-1">Add to
                                                            menu
                                                        </button>
                                                        <div class="form-check">
                                                            <label class="d-block">
                                                                <input type="checkbox"
                                                                       class="is_variant checkAll" name="checkAll">
                                                                <span>
                                                    Check All
                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card acc">
                                    <a class="card-link card-header text-dark" data-toggle="collapse" href="#collapseSeven"
                                       aria-expanded="false">
                                        Blog
                                    </a>
                                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="first_tab">
                                                <div id="find-table">
                                                    <div class="lis overflow-auto mb-3">
                                                        @foreach($blog as $blogs)
                                                            <div class="form-check">
                                                                <label class="d-block">
                                                                    <input value="{{$blogs->title}}" type="checkbox"
                                                                           class="is_variant pages_checkbox items"
                                                                           data_slug="{{$blogs->slug}}" name="is_variant">
                                                                    <span>
                                                    {{$blogs->title}}
                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="footer d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-primary fs-6 px-2 py-1">Add to
                                                            menu
                                                        </button>
                                                        <div class="form-check">
                                                            <label class="d-block">
                                                                <input type="checkbox"
                                                                       class="is_variant checkAll" name="checkAll">
                                                                <span>
                                                    Check All
                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card acc">
                                    <a class="card-link card-header text-dark" data-toggle="collapse" href="#collapseEight"
                                       aria-expanded="false">
                                        Categories
                                    </a>
                                    <div id="collapseEight" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="first_tab">
                                                <div id="find-table">
                                                    <div class="lis overflow-auto mb-3">
                                                        @foreach($categories as $category)
                                                            <div class="form-check">
                                                                <label class="d-block">
                                                                    <input value="{{$category->title}}" type="checkbox"
                                                                           class="is_variant pages_checkbox items"
                                                                           data_slug="{{$category->slug}}" name="is_variant">
                                                                    <span>
                                                    {{$category->title}}
                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="footer d-flex justify-content-between align-items-center">
                                                        <button class="btn btn-primary fs-6 px-2 py-1">Add to
                                                            menu
                                                        </button>
                                                        <div class="form-check">
                                                            <label class="d-block">
                                                                <input type="checkbox"
                                                                       class="is_variant checkAll" name="checkAll">
                                                                <span>
                                                    Check All
                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h5 class="page-title">Menu structure </h5>
                    </li>
                </ul>
                <div class="card w-100 p-3 my-0">
                    <div class="dd nestable">
                        <ol class="dd-list mb-0">
{{--                                                    <li class="dd-item" data-id="1" data-name="Home" data-slug="Home_slug" data-new="0"--}}
{{--                                                        data-deleted="0">--}}
{{--                                                        <div class="dd-handle"></div>--}}
{{--                                                        <span class="button-delete btn btn-default btn-xs pull-right" data-owner-id="1">--}}
{{--                                                            <i class="material-icons"> delete </i>--}}
{{--                                                        </span>--}}
{{--                                                        <span class="button-edit btn btn-default btn-xs pull-right" data-owner-id="1">--}}
{{--                                                            <i class="material-icons"> edit </i>--}}
{{--                                                        </span>--}}
{{--                                                    </li>--}}
                        </ol>
                    </div>
                </div>
                <form action="" class="">
                    <textarea class="form-control mt-4 d-none" id="json-output" rows="2"></textarea>
                    <button class="btn btn-primary float-right my-3" type="submit">Save Menu</button>
                </form>

            </div>

        </div>


    </div>
    @include ('management/jq')

    @include ('management/nestedplus')

@endsection

