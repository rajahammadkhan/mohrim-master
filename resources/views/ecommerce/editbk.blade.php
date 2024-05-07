@extends('management.layouts.master')
@section('title')
    edit product
@endsection
@section('content')
    <style>

        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }

        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
        body {
            min-height: 100vh;
            /*background-color: #757f9a;*/
            /*background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);*/
        }


        .noselect {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .multiselect {
            width: 100%;
            height: 30px;
            font-size: 15px;
            border-radius: 3px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: 0.2s;
            outline: none;
        }

        .multiselect:hover {
            border: 1px solid rgba(0, 0, 0, 0.3);
        }

        .multiselect.active {
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
            border-bottom: 1px solid transparent;
        }

        .multiselect > .title {
            cursor: pointer;
            height: 100%;
            padding: 6px;
        }

        .multiselect > .title > .text {
            max-width: 130px;
            max-height: 25px;
            display: block;
            float: left;
            overflow: hidden;
            line-height: 1.3em;
        }

        .multiselect > .title > .expand-icon,
        .multiselect > .title > .close-icon {
            float: right;
            border-radius: 50%;
            /* padding: 0px 6px; */
            border: 1px solid rgba(0, 0, 0, 0.1);
            font-weight: 700;
            transition: 0.2s;
            display: none;
            width: 20px;
            height: 20px;
            text-align: center;
        }

        .multiselect.selection > .title > .expand-icon {
            display: none;
        }

        .multiselect > .title > .expand-icon,
        .multiselect.selection > .title > .close-icon {
            display: block;
        }

        .multiselect > .title > .close-icon:hover {
            border: 1px solid rgba(0, 0, 0, 0.3);
            background: rgb(203, 32, 32);
            color: #fff;
        }

        .multiselect > .containerz {
            max-height: 200px;
            overflow: auto;
            margin-left: -1px;
            width: 92%;
            transition: 0.2s;
            position: absolute;
            z-index: 99;
            background: #fff;
        }

        .multiselect.active > .containerz {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            border-top: 0;
        }

        .multiselect:hover > .containerz {
            border-top-color: rgba(0, 0, 0, 0.3);
        }

        .multiselect.active:hover > .containerz {
            border-color: rgba(0, 0, 0, 0.3);
        }

        .multiselect > .containerz > option {
            display: none;
            padding: 5px;
            cursor: pointer;
            transition: 0.2s;
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
        }

        .multiselect > .containerz > option.selected {
            background: rgb(122, 175, 233);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        .multiselect > .containerz > option:hover {
            background: rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .multiselect.active > .containerz > option {
            display: block;
        }

    </style>

    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">edit product </h4>
                            </li>

                        </ul>
                    </div>
                </div>
                {{--                @php--}}
                {{--                    $bl = $_GET['type'];--}}
                {{--                @endphp--}}


                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label for="email_address1">Currency</label>
                            <select class="form-control select2" name="status" id="Quiz-type"
                                    data-placeholder="Select">
                                @foreach($CurrencyAgainstProduct as $currency)
                                <option value="{{$currency->currency_id}}">{{$currency->currency_id}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card py-4">

                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Title </strong></label>
                                            <div class="form-line">
                                                <input value="{{$product->title}}" type="text" id="erp_question_text"
                                                       class="form-control" name="title"
                                                       placeholder="Title" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Description </strong></label>
                                            <textarea type="text"
                                                      name="long_description"
                                                      id="erp_order_message" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10">{{old('long_description')}} {{$product->long_description}}</textarea>
                                        </div>
                                    </div>

                                    <label class="mt-3" for="email_address1"> <strong> Pricing </strong></label>

                                    <div class="stmain">
                                        <div class="row my-3">

                                            <div class="col-lg-12 mx-auto">
                                                <div class="test">
                                                    <label class="d-block">
                                                        <input {{ $product->is_variant == 1 ? 'checked' : '' }} value="1"
                                                               type="checkbox" class="is_variant" name="is_variant">
                                                        <span>
                                                    is variant
                                                </span>
                                                    </label>

                                                    <div class="ic " style="display:none">
                                                        <div class="col-lg-1">
                                                            <a href="javascript:void(0);" class="add_pro"
                                                               title="Add field"><i class="fas fa-plus"></i></a>
                                                        </div>

                                                        <div id="main-item-container"></div>

{{--                                                        @foreach($variation as $variation)--}}
{{--                                                            <div class="mt-4  clone_product" data-id="5">--}}


{{--                                                                <div id="accordion">--}}

{{--                                                                    <div class="card">--}}
{{--                                                                        <div class="card-header">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-10">--}}
{{--                                                                                    <div class="row">--}}
{{--                                                                                        <?php--}}
{{--                                                                                        $count = 0;--}}
{{--                                                                                        //                                                                                    $var = 'meta';--}}
{{--                                                                                        ?>--}}
{{--                                                                                        @foreach($variation as $key => $node)--}}
{{--                                                                                            <div class="col-3">--}}
{{--                                                                                                <label for="email_address1">{{$node->attribute_name ?? ''}} </label>--}}
{{--                                                                                                <select class="form-control"--}}
{{--                                                                                                        name="variation_option[${x}][{{$node->attribute_name ?? ''}}]"--}}
{{--                                                                                                        data-placeholder="Select">--}}

{{--                                                                                                    @dd($node->variations)--}}
{{--                                                                                                    @if($node->variations != null)--}}
{{--                                                                                                    @foreach(json_decode($node->variations) as $row)--}}

{{--                                                                                                        <option {{ old('status') == 1 ? 'Selected' : '' }}  value="{{$row ?? ''}}">--}}
{{--                                                                                                            {{$row ?? ''}}--}}
{{--                                                                                                        </option>--}}
{{--                                                                                                    @endforeach--}}


{{--                                                                                                </select>--}}




{{--                                                                                            </div>--}}

{{--                                                                                            <?php--}}
{{--                                                                                            $count++;--}}
{{--                                                                                            ?>--}}
{{--                                                                                        @endforeach--}}




{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}


{{--                                                                                @endforeach--}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="stock">
                                            <div class="row ">
                                                <div class=" col-12">
                                                    <label for="email_address1"> <strong> Stock </strong></label>
                                                    <div class="form-line">
                                                        <input value="{{old('stock')}}" type="text" id="stock"
                                                               class="form-control stk" name="stock"
                                                               placeholder="stock" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">

                                                <div class=" col-6">
                                                    <input value="{{old('compare_price')}}" name="compare_price"
                                                           class="-input active" placeholder="compare price ......"
                                                           type="text" autocomplete="off" min="1">

                                                </div>
                                                <div class="col-6">
                                                    <input value="{{old('discounted_price')}}" name="discounted_price"
                                                           class=" -input active" placeholder="discounted price......"
                                                           type="text" autocomplete="off" min="1">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Title </strong></label>
                                            <div class="form-line">
                                                <input value="{{$seo->meta_title ?? ''}}" type="text"
                                                       id="erp_question_text"
                                                       class="form-control" name="meta_title"
                                                       placeholder="Meta Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Description </strong></label>
                                            <textarea type="text"
                                                      name="meta_description"
                                                      id="erp_order_message" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10">
                                                {{$seo->meta_description ?? ''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Keywords </strong></label>

                                            <div class="form-line">
                                                <input value="{{$seo->meta_keywords ?? ''}}" type="text"
                                                       id="erp_question_text"
                                                       class="form-control" name="meta_keywords"
                                                       placeholder="Meta Keywords">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="variation" value="{{encrypt($variation)}}">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary  my-2 float-right"> Submit</button>
                                        </div>
                                    </div>


                                    <div class="row my-1">
                                        <div class=" col-12">
                                            <label for="email_address1">Status </label>
                                            <select class="form-control select2" name="status" id="Quiz-type"
                                                    data-placeholder="Select">
                                                <option {{$product->status == '1' ? 'selected' : ''}}  value=1>Publish
                                                </option>
                                                <option {{$product->status == '0' ? 'selected' : ''}} value=0>draft
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                    <div class="row my-3">--}}
                                    {{--                                                                                <div class=" col-12">--}}
                                    {{--                                                                                    <label for="email_address1">categories</label>--}}
                                    {{--                                                                                    <select class="form-control select2" name="category_id"  data-placeholder="Select" required>--}}
                                    {{--                                                                                        <option value=""> select </option>--}}
                                    {{--                                                                                        @foreach($categories as $category)--}}


                                    {{--                                                                                            <option {{ old('category') == $category ? 'Selected' : '' }} value={{$category->id}}>{{$category->title}}</option>--}}
                                    {{--                                                                                        @endforeach--}}
                                    {{--                                                                                    </select>--}}
                                    {{--                                                                                </div>--}}

                                    {{--                                    </div>--}}

                                    <label for="email_aQddress1"><b>Categories</b></label>
                                    <div class="form-group">
                                        @foreach($categories as $row)


                                            <label class="d-block">
                                                <input value=""
                                                       {{ in_array($row['id'], $usdu) ? "checked" : "" }}
                                                       type="checkbox" class="continue_selling" name="categories[]"
                                                       class="py-2">
                                                <span class="py-2">
                                        {{$row['title']}}
                                              </span>

                                        @endforeach
                                    </div>

{{--                                    @foreach($options as $varops)--}}

{{--                                        @dd(json_decode($varops->variant_options))--}}
{{--                                        @endforeach--}}
{{--                                    @dd($product->brands)--}}
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1">Brands</label>
                                            <select class="form-control select2" name="brand_id"
                                                    data-placeholder="Select" required>
                                                <option value=""> select</option>
                                                @foreach($brands as $brand)
                                                    <option {{$product->brands->brand_id == $brand->id ? 'Selected' : '' }} value={{$brand->id}}>{{$brand->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1">Size chart</label>

                                            <select class="form-control select2" name="brand_id"
                                                    data-placeholder="Select" required>
                                                <option value=""> select</option>
                                                @foreach($chartsize as $charts)

                                                    <option {{$product->chart_id == $charts->id ? 'selected': ''}} value={{$charts->id}}>{{$charts->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row my-3">
                                        <div class="col-lg-12 mx-auto">
                                            <div class="test">
                                                <label class="d-block">
                                                    <input {{$product->continue_selling == 1 ? 'checked' : '' }} value="1"
                                                           type="checkbox" class="continue_selling"
                                                           name="continue_selling">
                                                    <span>
                                                    continue selling ? when out of stock !!
                                                </span>
                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                    @foreach($media as $image)
                                        <div class="row oldimage">
                                            <div class="col">
                                                <div class="main_container m-3">
                                                    <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                                        <div class="select_img d-flex justify-content-center align-items-center">
                                                            <div class="dz-message p-3 text-center">
                                                                <div class="drag-icon-cph">
                                                                    <i class="material-icons" style="font-size: 35px">touch_app</i>
                                                                </div>
                                                                <h3>Click to upload.</h3>
                                                                <em>(This is just a demo dropzone. Selected files are
                                                                    <strong>not</strong> actually uploaded.)
                                                                </em>
                                                            </div>
                                                        </div>
                                                        <input type="file" name="editimage[{{$image->id}}]"
                                                               accept=".jpg,.gif,.png"
                                                               class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                                        <div class="img-thumb">
                                                            <img class="main_img d-block w-100 h-100 position-absolute"
                                                                 src="{{asset('images/media/'.$image->image)}}">
                                                        </div>
                                                    </div>
                                                    <a class="btn mt-3 add_clone fw-normal border-0 shadow-none">Add
                                                        More</a>
                                                    <a class="btn mt-3 remove_lol fw-normal border-0 shadow-none"
                                                       data-id="{{$image->id}}">Remove</a>

                                                </div>
                                            </div>

                                        </div>
                                    @endforeach


                                    <div class="row my-1">
                                        <div class="col-12 test">
                                            {{--                                            @if(base64_decode($bl) != 'deals')--}}
                                            {{--                                                <input type="hidden"  value="coupon"  name="coupon_type">--}}
                                            {{--                                                <input {{ old('coupon_code') =='coupon_code' ? 'Selected' : '' }}   name="coupon_code" class="flatPicker flatpickr-input active" placeholder="coupon code" type="text" autocomplete="off" min="1">--}}
                                            {{--                                            @else--}}
                                            {{--                                                <input type="hidden"  value="deals"  name="coupon_type">--}}
                                            {{--                                            @endif--}}
                                            {{--                                            <input   name="discount" class="flatPicker flatpickr-input active" placeholder="Discount %" type="text" autocomplete="off" min="1"></div>--}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                <div class="d-none  cloner" style="display:none;">
                    <div class="row wow-remove">
                        <div class="col">
                            <div class="main_container m-3">
                                <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                    <div class="select_img d-flex justify-content-center align-items-center">
                                        <div class="dz-message p-3 text-center">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons" style="font-size: 35px">touch_app</i>
                                            </div>
                                            <h3>Click to upload.</h3>
                                        </div>
                                    </div>
                                    <input type="file" name="image[]"
                                           class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                    <div class="img-thumb">
                                    </div>
                                </div>
                                <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>
                                <a class="btn mt-3  fw-normal add_clone border-0 shadow-none">Add More</a>
                            </div>
                        </div>

                    </div>
                </div>

                {{--                $rows--}}
                <script>
                    $(document).ready(function () {
                        var inp = $(".stmain input.is_variant");
                        if(inp.is(':checked')){
                            $('.ic').show();
                            $('.stock').hide();
                        }
                        var maxField = 10; //Input fields increment limitation
                        var addButton = $('.add_clone'); //Add button selector
                        // var wrapper = $('.team_main'); //Input field wrapper
                        var fieldHTML = jQuery('.cloner .row');
                        var fieldHTML2 = '<a href="javascript:void(0);" class="remove_button btn btn-dark mx-1">Cancel</a>';
                        var x = 1; //Initial field counter is 1

                        //Once add button is clicked
                        $(document).on('click', '.add_clone', function () {
                            var wow = $(this);
                            //Check maximum number of input fields
                            if (x < maxField) {
                                x++;
                                $(wow).parents('.multiimage').append($(fieldHTML).clone());
                            }
                        });
                        //Once remove button is clicked
                        $(document).on('click', '.remove_clone', function (e) {

                            $(this).parents('.wow-remove').remove(); //Remove field html
                            if ($(".multiimage .row").length == 0) {
                                $('.multiimage').append($(fieldHTML).clone());

                            }

                        });
                    });

                </script>

                <script>

                    // $(document).ready(function (){
                    //
                    //     if( $('.test select option:selected').val() == "coupon"){
                    //         $(this).parents('.test').find('.ic').show();
                    //     }
                    //     $('.ic').hide();
                    //
                    //     $('.test select').on('change', function() {
                    //         //  alert( this.value ); // or $(this).val()
                    //         if($(this).val() == "coupon") {
                    //             $(this).parents('.test').find('.ic').show();
                    //         } else {
                    //             $('.ic').hide();
                    //         }
                    //     });
                    // });


                </script>
                <script>
                    $(document).ready(function () {
                        var maxFields = 10; //Input fields increment limitation
                        var addButtons = $('.add_pro'); //Add button selector
                        var wrappers = $('.stmain'); //Input field wrapper

                        var fieldHTMLs = jQuery('.clone_product');
                        var fieldHTML2s = '<a href="javascript:void(0);" class="remove_button btn btn-dark mx-1">Cancel</a>';
                        var x = 0; //Initial field counter is 1
                        var dataId = parseInt($('.clone_product:last-child').attr("data-id"));

                        if ($('.clone_product').length>0) {
                            dataId = parseInt($('.clone_product:last-child').attr("data-id"));
                        }
                        else{
                            dataId=0;
                        }
                        //Once add button is clicked

                        $(addButtons).click(function () {

                            if ($('.clone_product').length>0) {
                                dataId++;
                            }


                            var wows = $(this);
                            //Check maximum number of input fields
                            if (x < maxFields) {

                                var hml = ` <div class="mt-4  clone_product" data-id="5">


                                                            <div id="accordion">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                         <div class="row">
                                                                            <div class="col-10">
                                                                                <div class="row">
                                                                                    <?php
                                $count = 0;
                                //                                                                                    $var = 'meta';
                                ?>
                                @foreach($variation as $key => $node)

                                <div class="col-3">
                                    <label for="email_address1">{{$node->attribute_name}} </label>
                                                                                            <select class="form-control"
                                                                                                    name="variation_option[${x}][{{$node->attribute_name}}]"
                                                                                                    data-placeholder="Select">
                                                                                                @foreach(json_decode($node->variations) as $row)

                                <option {{ old('status') == 1 ? 'Selected' : '' }}  value="{{$row}}">
                                                                                                        {{$row}}
                                </option>

                                @endforeach


                                </select>




                            </div>



<?php
                                $count++;

                                ?>
                                @endforeach





                                </div>
                            </div>
                            <div class="col-2">
                                <a class="collapsed card-link"
                                   data-toggle="collapse"
                                   href="#collapseTwo">
                                    +
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="collapse" data-parent="#accordion">

                        <div class="card-body">
                            <div class="row my-2">

                                <div class=" col-6">
                                    <input value="{{old('compare_price_var')}}"
                                                                                           name="compare_price_var[${x}]"
                                                                                           class="-input active"
                                                                                           placeholder="compare ......"
                                                                                           type="text"
                                                                                           autocomplete="off" min="1">

                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <input value="{{old('discounted_price_var')}}"
                                                                                           name="discounted_price_var[${x}]"
                                                                                           class=" -input active"
                                                                                           placeholder="discounted price......"
                                                                                           type="text"
                                                                                           autocomplete="off" min="1">

                                                                                </div>
                                                                            </div>
                                                                            <div class="row my-2">

                                                                                <div class=" col-6">
                                                                                    <input value="{{old('sku')}}"
                                                                                           name="sku[${x}]"
                                                                                           class="-input active"
                                                                                           placeholder="Sku code ......"
                                                                                           type="text"
                                                                                           autocomplete="off" min="1">

                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <input value="{{old('quantity')}}"
                                                                                           name="quantity[${x}]"
                                                                                           class=" -input active"
                                                                                           placeholder="Quantity ......"
                                                                                           type="text"
                                                                                           autocomplete="off" min="1">

                                                                                </div>
                                                                            </div>
                                                                            <div class="multiimage">

                                                                                <div class="row wow-remove">
                                                                                    <div class="col ">
                                                                                        <div class="main_container m-3">
                                                                                            <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                                                                                <div class="select_img d-flex justify-content-center align-items-center">
                                                                                                    <div class="dz-message p-3 text-center">
                                                                                                        <div class="drag-icon-cph">
                                                                                                            <i class="material-icons"
                                                                                                               style="font-size: 35px">touch_app</i>
                                                                                                        </div>
                                                                                                        <h3>Click to
                                                                                                            upload.</h3>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="file"
                                                                                                       name="var_image[${x}]"
                                                                                                       class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                                                                                <div class="img-thumb">
                                                                                                </div>
                                                                                            </div>
                                                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`
                                document.getElementById("main-item-container").innerHTML += hml;
                                $('.clone_product:last-child').attr("data-id", dataId);
                                x++;

                                // $(wows).parents('.stmain').append($(fieldHTMLs).clone());
                                // fieldHTMLs.find(".collapse").attr('id',`collapsed${x}`);
                                // fieldHTMLs.find("[data-toggle='collapse']").attr('href',`#collapsed${x}`);
                                // var val = fieldHTMLs.find('.collapsed').click(()=>$(this).parents(fieldHTMLs).find("collapse").addClass("show"))
                                // console.log(val)
                                // var fieldz = document.getElementsByClassName("clone_product");
                                // var fieldz = $('.clone_product');
                                // var indx = x-1;
                                // var indexez = fieldz[indx];
                                // var changez = fieldz[indx];
                                // var changez = fieldz.find('select.form-control');

                                // changez = changez.setAttribute("name", `variation_option[${indx}][gender]`);
                                // console.log(changez)
                                // $( ".clone_product" ).each(function(index) {
                                // var attrib = "[" + $(this).find('select.form-control').attr("name").split("][")[1];
                                // var attrib  = "[" + this.querySelectorAll("select.form-control")[index].getAttribute("name").split("][")[1];
                                // var valuz = $(this).find('select.form-control').attr("name", `variation_option[${index}][${attrib}]`);
                                // console.log($(this).find('select.form-control').attr("name"));
                                {{--var valuz = $(this).find('select.form-control').attr("name", `variation_option[${index}][{{$node->attribute_name}}]`);--}}
                                // console.log(attrib)
                                // });
                                // console.log(indexez)
                                // console.log(indx)

                            }

                            // fieldHTMLs.attr("data-id", "1");
                            // var fil = fieldHTMLs.attr("data-id");
                            // console.log(fil);

                        });

                        $(document).on('click', '.collapsed', function () {
                            $(this).parents('.clone_product').find(".collapse").toggleClass("show");
                        });
                        //Once remove button is clicked
                        $(wrapper).on('click', '.remove_button', function (e) {
                            e.preventDefault();
                            $(this).parents('.clone_product',).remove(); //Remove field html
                            x--; //Decrement field counter
                        });
                    });

                    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                        removeItemButton: true,
                        maxItemCount: 10,
                        allowHTML: true,
                        searchResultLimit: 10,
                        renderChoiceLimit: 10
                    });

                </script>

{{--                <script>--}}
{{--                    $(document).ready(function () {--}}

{{--                        var maxFields = 10;--}}
{{--                        var addButtons = $('.add_pro');--}}
{{--                        var x = {{$count}};--}}
{{--                        if (x != 0) {--}}
{{--                            var i = 0;--}}
{{--                            while (i < x) {--}}
{{--                                var hml = ` <div class="mt-4  clone_product" id="">--}}


{{--                                                            <div id="accordion">--}}

{{--                                                                <div class="card">--}}
{{--                                                                    <div class="card-header">--}}
{{--                                                                         <div class="row">--}}
{{--                                                                            <div class="col-10">--}}
{{--                                                                                <div class="row">--}}
{{--                                                                                    <?php--}}
{{--                                $count = 0;--}}
{{--                                //                                                                                    $var = 'meta';--}}
{{--                                ?>--}}
{{--                                @foreach($variation as $key => $node)--}}

{{--                                <div class="col-3">--}}
{{--                                    <label for="email_address1">{{$node->attribute_name}} </label>--}}
{{--                                                                                            <select class="form-control"--}}
{{--                                                                                                    name="variation_option[${i}][{{$node->attribute_name}}]"--}}
{{--                                                                                                    data-placeholder="Select">--}}
{{--                                                                                                @foreach(json_decode($node->variations) as $row)--}}

{{--                                <option {{ old('status') == 1 ? 'Selected' : '' }}  value="{{$row}}">--}}
{{--                                                                                                        {{$row}}--}}
{{--                                </option>--}}
{{--@endforeach--}}

{{--                                </select>--}}




{{--                            </div>--}}

{{--<?php--}}
{{--                                $count++;--}}
{{--                                ?>--}}
{{--                                @endforeach--}}




{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-2">--}}
{{--                                <a class="collapsed card-link"--}}
{{--                                   data-toggle="collapse"--}}
{{--                                   href="#collapseTwo">--}}
{{--                                    +--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="collapse" data-parent="#accordion">--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="row my-2">--}}

{{--                                <div class=" col-6">--}}
{{--                                    <input value="{{old('compare_price_var')}}"--}}
{{--                                                                                           name="compare_price_var[${i}]"--}}
{{--                                                                                           class="-input active"--}}
{{--                                                                                           placeholder="compare ......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                                <div class="col-6">--}}
{{--                                                                                    <input value="{{old('discounted_price_var')}}"--}}
{{--                                                                                           name="discounted_price_var[${i}]"--}}
{{--                                                                                           class=" -input active"--}}
{{--                                                                                           placeholder="discounted price......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="row my-2">--}}

{{--                                                                                <div class=" col-6">--}}
{{--                                                                                    <input value="{{old('sku')}}"--}}
{{--                                                                                           name="sku[${i}]"--}}
{{--                                                                                           class="-input active"--}}
{{--                                                                                           placeholder="Sku code ......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                                <div class="col-6">--}}
{{--                                                                                    <input value="{{old('quantity')}}"--}}
{{--                                                                                           name="quantity[${i}]"--}}
{{--                                                                                           class=" -input active"--}}
{{--                                                                                           placeholder="Quantity ......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="multiimage">--}}

{{--                                                                                <div class="row wow-remove">--}}
{{--                                                                                    <div class="col ">--}}
{{--                                                                                        <div class="main_container m-3">--}}
{{--                                                                                            <div class="main imagebox position-relative rounded-3 overflow-hidden">--}}
{{--                                                                                                <div class="select_img d-flex justify-content-center align-items-center">--}}
{{--                                                                                                    <div class="dz-message p-3 text-center">--}}
{{--                                                                                                        <div class="drag-icon-cph">--}}
{{--                                                                                                            <i class="material-icons"--}}
{{--                                                                                                               style="font-size: 35px">touch_app</i>--}}
{{--                                                                                                        </div>--}}
{{--                                                                                                        <h3>Click to--}}
{{--                                                                                                            upload.</h3>--}}
{{--                                                                                                    </div>--}}
{{--                                                                                                </div>--}}
{{--                                                                                                <input type="file"--}}
{{--                                                                                                       name="var_image[${i}]"--}}
{{--                                                                                                       class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>--}}
{{--                                                                                                <div class="img-thumb">--}}
{{--                                                                                                </div>--}}
{{--                                                                                            </div>--}}
{{--                                                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>--}}

{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}

{{--                                                                                </div>--}}
{{--                                                                            </div>--}}

{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>`--}}
{{--                                document.getElementById("main-item-container").innerHTML += hml;--}}
{{--                                i++;--}}
{{--                            }--}}
{{--                        }--}}

{{--                        $(addButtons).click(function () {--}}
{{--                            var wows = $(this);--}}
{{--                            if (x < maxFields) {--}}
{{--                                var hml = ` <div class="mt-4  clone_product" id="">--}}


{{--                                                            <div id="accordion">--}}

{{--                                                                <div class="card">--}}
{{--                                                                    <div class="card-header">--}}
{{--                                                                         <div class="row">--}}
{{--                                                                            <div class="col-10">--}}
{{--                                                                                <div class="row">--}}
{{--                                                                                    <?php--}}
{{--                                $count = 0;--}}
{{--                                //                                                                                    $var = 'meta';--}}
{{--                                ?>--}}
{{--                                @foreach($variation as $key => $node)--}}

{{--                                <div class="col-3">--}}
{{--                                    <label for="email_address1">{{$node->attribute_name}} </label>--}}
{{--                                                                                            <select class="form-control"--}}
{{--                                                                                                    name="variation_option[${x}][{{$node->attribute_name}}]"--}}
{{--                                                                                                    data-placeholder="Select">--}}
{{--                                                                                                @foreach(json_decode($node->variations) as $row)--}}

{{--                                <option {{ old('status') == 1 ? 'Selected' : '' }}  value="{{$row}}">--}}
{{--                                                                                                        {{$row}}--}}
{{--                                </option>--}}
{{--@endforeach--}}

{{--                                </select>--}}




{{--                            </div>--}}

{{--<?php--}}
{{--                                $count++;--}}
{{--                                ?>--}}
{{--                                @endforeach--}}




{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-2">--}}
{{--                                <a class="collapsed card-link"--}}
{{--                                   data-toggle="collapse"--}}
{{--                                   href="#collapseTwo">--}}
{{--                                    +--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="collapse" data-parent="#accordion">--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="row my-2">--}}

{{--                                <div class=" col-6">--}}
{{--                                    <input value="{{old('compare_price_var')}}"--}}
{{--                                                                                           name="compare_price_var[${x}]"--}}
{{--                                                                                           class="-input active"--}}
{{--                                                                                           placeholder="compare ......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                                <div class="col-6">--}}
{{--                                                                                    <input value="{{old('discounted_price_var')}}"--}}
{{--                                                                                           name="discounted_price_var[${x}]"--}}
{{--                                                                                           class=" -input active"--}}
{{--                                                                                           placeholder="discounted price......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="row my-2">--}}

{{--                                                                                <div class=" col-6">--}}
{{--                                                                                    <input value="{{old('sku')}}"--}}
{{--                                                                                           name="sku[${x}]"--}}
{{--                                                                                           class="-input active"--}}
{{--                                                                                           placeholder="Sku code ......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                                <div class="col-6">--}}
{{--                                                                                    <input value="{{old('quantity')}}"--}}
{{--                                                                                           name="quantity[${x}]"--}}
{{--                                                                                           class=" -input active"--}}
{{--                                                                                           placeholder="Quantity ......"--}}
{{--                                                                                           type="text"--}}
{{--                                                                                           autocomplete="off" min="1">--}}

{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="multiimage">--}}

{{--                                                                                <div class="row wow-remove">--}}
{{--                                                                                    <div class="col ">--}}
{{--                                                                                        <div class="main_container m-3">--}}
{{--                                                                                            <div class="main imagebox position-relative rounded-3 overflow-hidden">--}}
{{--                                                                                                <div class="select_img d-flex justify-content-center align-items-center">--}}
{{--                                                                                                    <div class="dz-message p-3 text-center">--}}
{{--                                                                                                        <div class="drag-icon-cph">--}}
{{--                                                                                                            <i class="material-icons"--}}
{{--                                                                                                               style="font-size: 35px">touch_app</i>--}}
{{--                                                                                                        </div>--}}
{{--                                                                                                        <h3>Click to--}}
{{--                                                                                                            upload.</h3>--}}
{{--                                                                                                    </div>--}}
{{--                                                                                                </div>--}}
{{--                                                                                                <input type="file"--}}
{{--                                                                                                       name="var_image[${x}]"--}}
{{--                                                                                                       class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>--}}
{{--                                                                                                <div class="img-thumb">--}}
{{--                                                                                                </div>--}}
{{--                                                                                            </div>--}}
{{--                                                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>--}}

{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}

{{--                                                                                </div>--}}
{{--                                                                            </div>--}}

{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>`--}}
{{--                                document.getElementById("main-item-container").innerHTML += hml;--}}
{{--                                x++;--}}
{{--                            }--}}
{{--                        });--}}


{{--                        $(document).on('click', '.collapsed', function () {--}}
{{--                            $(this).parents('.clone_product').find(".collapse").toggleClass("show");--}}
{{--                        });--}}
{{--                        //Once remove button is clicked--}}
{{--                        $(wrapper).on('click', '.remove_button', function (e) {--}}
{{--                            e.preventDefault();--}}
{{--                            $(this).parents('.clone_product',).remove(); //Remove field html--}}
{{--                            x--; //Decrement field counter--}}
{{--                        });--}}
{{--                    });--}}

{{--                    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {--}}
{{--                        removeItemButton: true,--}}
{{--                        maxItemCount: 10,--}}
{{--                        allowHTML: true,--}}
{{--                        searchResultLimit: 10,--}}
{{--                        renderChoiceLimit: 10--}}
{{--                    });--}}

{{--                </script>--}}

                {{--                <script>--}}
                {{--                    Array.prototype.search = function (elem) {--}}
                {{--                        for (var i = 0; i < this.length; i++) {--}}
                {{--                            if (this[i] == elem) return i;--}}
                {{--                        }--}}

                {{--                        return -1;--}}
                {{--                    };--}}

                {{--                    var Multiselect = function (selector) {--}}
                {{--                        if (!$(selector)) {--}}
                {{--                            console.error("ERROR: Element %s does not exist.", selector);--}}
                {{--                            return;--}}
                {{--                        }--}}

                {{--                        this.selector = selector;--}}
                {{--                        this.selections = [];--}}

                {{--                        (function (that) {--}}
                {{--                            that.events();--}}
                {{--                        })(this);--}}
                {{--                    };--}}

                {{--                    Multiselect.prototype = {--}}
                {{--                        open: function (that) {--}}
                {{--                            var target = $(that).parent().attr("data-target");--}}

                {{--                            // If we are not keeping track of this one's entries, then--}}
                {{--                            // start doing so.--}}
                {{--                            if (!this.selections) {--}}
                {{--                                this.selections = [];--}}
                {{--                            }--}}

                {{--                            $(this.selector + ".multiselect").toggleClass("active");--}}
                {{--                        },--}}

                {{--                        close: function () {--}}
                {{--                            $(this.selector + ".multiselect").removeClass("active");--}}
                {{--                        },--}}

                {{--                        events: function () {--}}
                {{--                            var that = this;--}}

                {{--                            $(document).on("click", that.selector + ".multiselect > .title", function (e) {--}}
                {{--                                if (e.target.className.indexOf("close-icon") < 0) {--}}
                {{--                                    that.open();--}}
                {{--                                }--}}
                {{--                            });--}}

                {{--                            $(document).on("click", that.selector + ".multiselect option", function (e) {--}}
                {{--                                var selection = $(this).attr("value");--}}
                {{--                                var target = $(this).parent().parent().attr("data-target");--}}

                {{--                                var io = that.selections.search(selection);--}}

                {{--                                if (io < 0) that.selections.push(selection);--}}
                {{--                                else that.selections.splice(io, 1);--}}

                {{--                                that.selectionStatus();--}}
                {{--                                that.setSelectionsString();--}}
                {{--                            });--}}

                {{--                            $(document).on("click", that.selector + ".multiselect > .title > .close-icon", function (e) {--}}
                {{--                                that.clearSelections();--}}
                {{--                            });--}}

                {{--                            $(document).click(function (e) {--}}
                {{--                                if (e.target.className.indexOf("title") < 0) {--}}
                {{--                                    if (e.target.className.indexOf("text") < 0) {--}}
                {{--                                        if (e.target.className.indexOf("-icon") < 0) {--}}
                {{--                                            if (e.target.className.indexOf("selected") < 0 ||--}}
                {{--                                                e.target.localName != "option") {--}}
                {{--                                                that.close();--}}
                {{--                                            }--}}
                {{--                                        }--}}
                {{--                                    }--}}
                {{--                                }--}}
                {{--                            });--}}
                {{--                        },--}}

                {{--                        selectionStatus: function () {--}}
                {{--                            var obj = $(this.selector + ".multiselect");--}}

                {{--                            if (this.selections.length) obj.addClass("selection");--}}
                {{--                            else obj.removeClass("selection");--}}
                {{--                        },--}}

                {{--                        clearSelections: function () {--}}
                {{--                            this.selections = [];--}}
                {{--                            this.selectionStatus();--}}
                {{--                            this.setSelectionsString();--}}
                {{--                        },--}}

                {{--                        getSelections: function () {--}}
                {{--                            return this.selections;--}}
                {{--                        },--}}

                {{--                        setSelectionsString: function () {--}}
                {{--                            var selects = this.getSelectionsString().split(", ");--}}
                {{--                            $(this.selector + ".multiselect > .title").attr("title", selects);--}}

                {{--                            var opts = $(this.selector + ".multiselect option");--}}

                {{--                            if (selects.length > 6) {--}}
                {{--                                var _selects = this.getSelectionsString().split(", ");--}}
                {{--                                _selects = _selects.splice(0, 6);--}}
                {{--                                $(this.selector + ".multiselect > .title > .text")--}}
                {{--                                    .text(_selects + " [...]");--}}
                {{--                            } else {--}}
                {{--                                $(this.selector + ".multiselect > .title > .text")--}}
                {{--                                    .text(selects);--}}
                {{--                            }--}}

                {{--                            for (var i = 0; i < opts.length; i++) {--}}
                {{--                                $(opts[i]).removeClass("selected");--}}
                {{--                            }--}}

                {{--                            for (var j = 0; j < selects.length; j++) {--}}
                {{--                                var select = selects[j];--}}

                {{--                                for (var i = 0; i < opts.length; i++) {--}}
                {{--                                    if ($(opts[i]).attr("value") == select) {--}}
                {{--                                        $(opts[i]).addClass("selected");--}}
                {{--                                        break;--}}
                {{--                                    }--}}
                {{--                                }--}}
                {{--                            }--}}
                {{--                        },--}}

                {{--                        getSelectionsString: function () {--}}
                {{--                            if (this.selections.length > 0)--}}
                {{--                                return this.selections.join(", ");--}}
                {{--                            else return "Select";--}}
                {{--                        },--}}

                {{--                        setSelections: function (arr) {--}}
                {{--                            if (!arr[0]) {--}}
                {{--                                error("ERROR: This does not look like an array.");--}}
                {{--                                return;--}}
                {{--                            }--}}

                {{--                            this.selections = arr;--}}
                {{--                            this.selectionStatus();--}}
                {{--                            this.setSelectionsString();--}}
                {{--                        },--}}
                {{--                    };--}}

                {{--                    $(document).ready(function () {--}}
                {{--                        var multi = new Multiselect("#countries");--}}
                {{--                    });--}}

                {{--                </script>--}}
                <script>
                    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                        removeItemButton: true,
                        maxItemCount: 10,
                        allowHTML: true,
                        searchResultLimit: 10,
                        renderChoiceLimit: 10
                    });
                </script>

@endsection

