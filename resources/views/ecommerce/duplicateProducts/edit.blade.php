@extends('management.layouts.master')
@section('title')
    edit Duplicate product
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
                                <h4 class="page-title">edit Duplicate product </h4>
                            </li>
                            <li>
                                <select class="form-control" name="forma" onchange="location = this.value;">
                                    <option value="" selected>Choose Country</option>
                                    @foreach($CurrencyAgainstProduct as $CurrencyAgainstProducts)
                                        <input type="hidden" name="cur_id" value="{{$CurrencyAgainstProducts}}">
                                        <option value="{{route('duplicateProducts.show',$product->id).'?cur_id='.$CurrencyAgainstProducts}}">{{$CurrencyAgainstProducts}}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{route('duplicateProducts.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card py-4">
                                <div class="body">
                                    <div class="form-group">
                                        <label for="email_address1"> <strong> Title </strong></label>
                                        <div class="form-line">
                                            <input value="{{$product->title}}" type="text" id="erp_question_text"
                                                   class="form-control" name="title"
                                                   placeholder="Title" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_address1"> <strong> Description </strong></label>
                                        <textarea type="text"
                                                  name="long_description"
                                                  id="erp_order_message" class="ckeditor form-control choices"
                                                  cols="30"
                                                  rows="10">{{old('long_description')}} {{$product->long_description}}</textarea>
                                    </div>
                                </div>
                            </div>




                            {{--Option / Variation --}}
                            {{--                            @if($product->is_variant == 1)--}}
                            <div class="card">
                                <div class="body">
                                    <h5 class="mb-2" for="email_address1">  Options </h5>
                                    <div class="stmain">
                                        <div class="row my-3">
                                            <div class="col-lg-12 mx-auto m-0">
                                                <div class="test">
                                                    <div class="form-group m-0">
                                                        <label class="d-block">
                                                            <input {{$product->is_variant == '1' ? 'checked' : '' }} value="1"
                                                                   type="checkbox" class="is_variant" name="is_variant">
                                                            <span>
                                                    This product has options, like size or color
                                                </span>
                                                        </label>
                                                    </div>
                                                    <div class="ic " style="{{$product->is_variant == '1' ? '' : 'display:none' }}">
                                                        <div class="col-lg-1">
                                                            <a href="javascript:void(0);" class="add_pro"
                                                               title="Add field"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                        <div id="main-item-container">
                                                            @if(isset($ProductVariantsAgainstCurrency))
                                                                <?php
                                                                $count = 0;
                                                                //                                                                                    $var = 'meta';
                                                                ?>
                                                                @foreach($ProductVariantsAgainstCurrency as $VariantsAgainst)
                                                                    <div class="mt-4  clone_product" data-id="{{$count}}">
                                                                        <div id="accordion">
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <div class="row">
                                                                                        <div class="col-11">
                                                                                            <div class="row">
                                                                                                @foreach($variation as $key => $node)
                                                                                                    <div class="col-3">
                                                                                                        <label for="email_address1">{{$node->attribute_name}} </label>

                                                                                                        <select class="form-control"
                                                                                                                name="variation_option[${x}][{{$node->id}}][{{$node->attribute_name}}]"
                                                                                                                data-placeholder="Select">
                                                                                                            @foreach(json_decode($node->variations) as $row)

                                                                                                                <option {{ old('status') == 1 ? 'Selected' : '' }}
                                                                                                                        value="{{$row}}">
                                                                                                                    {{$row}}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-1 d-flex align-items-center justify-content-center">
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
                                                                                                <input value="{{old('compare_price_var')}} {{$VariantsAgainst->compare_price}}"
                                                                                                       name="compare_price_var[${x}]"
                                                                                                       class="-input active"
                                                                                                       placeholder="compare ......"
                                                                                                       type="text"
                                                                                                       autocomplete="off" min="1">

                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <input value="{{old('discounted_price_var')}} {{$VariantsAgainst->discounted_price}}"
                                                                                                       name="discounted_price_var[${x}]"
                                                                                                       class=" -input active"
                                                                                                       placeholder="discounted price......"
                                                                                                       type="text"
                                                                                                       autocomplete="off" min="1">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row my-2">
                                                                                            <div class=" col-6">
                                                                                                <input value="{{old('sku')}} {{$VariantsAgainst->sku}}"
                                                                                                       name="sku[${x}]"
                                                                                                       class="-input active"
                                                                                                       placeholder="Sku code ......"
                                                                                                       type="text"
                                                                                                       autocomplete="off" min="1">
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <input value="{{old('quantity')}} {{$VariantsAgainst->quantity}}"
                                                                                                       name="quantity[${x}]"
                                                                                                       class=" -input active"
                                                                                                       placeholder="Quantity ......"
                                                                                                       type="text"
                                                                                                       autocomplete="off" min="1">
                                                                                            </div>
                                                                                            {{--                                                                                    <div class="row my-1">--}}
                                                                                            {{--                                                                                        <div class=" col-12">--}}
                                                                                            {{--                                                                                            <label for="email_address1">country </label>--}}
                                                                                            {{--                                                                                            <select class="form-control select2" {{$VariantsAgainst->country_id == 'Selected' }} name="country_var[${x}]" id="Quiz-type"--}}
                                                                                            {{--                                                                                                    data-placeholder="Select">--}}
                                                                                            {{--                                                                                            </select>--}}
                                                                                            {{--                                                                                        </div>--}}
                                                                                            {{--                                                                                    </div>--}}
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
                                                                                                                @if($VariantsAgainst == null)
                                                                                                                @else
                                                                                                                    <img class="main_img d-block w-100 h-100 position-absolute" src="{{asset('images/media'.'/'.$VariantsAgainst->image)}}" alt="">
                                                                                                                @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @if($VariantsAgainst == null)

                                                                                                        @else
                                                                                                            <a class="btn mt-3 remove_lol fw-normal border-0 shadow-none" data-id="{{$VariantsAgainst->id}}">Remove</a>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $count++;
                                                                    ?>
                                                                @endforeach
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Option / Variation --}}


                            {{--Stock & Prices --}}
                            @if(isset($ProductPriceAgainstCurrency))
                                <div class="card stock" style="{{isset($ProductPriceAgainstCurrency) ? ''  : 'display:none;'}}">
                                    @foreach($ProductPriceAgainstCurrency as $ProductPrice)
                                        <div class="header">
                                            <div class="stck">
                                                <h5 class="mb-2" for="email_address1">  Pricing </h5>
                                                <div class=" form-group">
                                                    <label for="email_address1"> Stock </label>
                                                    <div class="form-line">
                                                        <input value="{{$ProductPrice->stock}}" type="number" id="stock"
                                                               class="form-control stk" name="stock"
                                                               placeholder="stock" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_address1">Price</label>
                                                    <input value="{{$ProductPrice->compare_price}}" name="compare_price"
                                                           class="form-control" placeholder="compare price"
                                                           type="number" autocomplete="off" min="1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_address1">Discounted Price</label>
                                                    <input value="{{$ProductPrice->discounted_price}}" name="discounted_price"
                                                           class=" form-control" placeholder="discounted price"
                                                           type="number" autocomplete="off" min="1">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            {{--                            @endif--}}
                            {{--Stock & Prices --}}

                            {{--Seo Tool Zero--}}
                            <div class="card">
                                <div class="header">
                                    <h5>Search engine listing</h5>
                                    <div class=" form-group">

                                        <label for="email_address1"> Meta Title </label>
                                        <div class="form-line">
                                            <input value="{{$seo->meta_title ?? ''}}" type="text"
                                                   id="erp_question_text"
                                                   class="form-control" name="meta_title"
                                                   placeholder="Meta Title">
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label for="email_address1"> Meta Description </label>
                                        <textarea type="text"
                                                  name="meta_description"
                                                  id="erp_order_message" class="ckeditor form-control choices"
                                                  cols="30"
                                                  rows="10">
                                                {{$seo->meta_description ?? ''}}</textarea>
                                    </div>
                                    <div class=" form-group">
                                        <label for="email_address1">  Meta Keywords </label>
                                        <div class="form-line">
                                            <input value="{{$seo->meta_keywords ?? ''}}" type="text"
                                                   id="erp_question_text"
                                                   class="form-control" name="meta_keywords"
                                                   placeholder="Meta Keywords">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Seo Tool Zero--}}

                        </div>
                        <input type="hidden" name="variation" value="{{encrypt($variation)}}">
                        <div class="col-md-4">
                            {{--Published / Draft /  Where --}}
                            <div class="card">
                                <div class="body">
                                    {{--@dd($CurrencyAgainstProduct[0])--}}
                                    <div class="form-group">
                                        <label for="email_address1">Product Status </label>
                                        <select class="form-control select2" name="status" id="Quiz-type"
                                                data-placeholder="Select">
                                            <option {{$product->status == '1' ? 'selected' : ''}}  value=1>Publish
                                            </option>
                                            <option {{$product->status == '0' ? 'selected' : ''}} value=0>draft
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_address1">Country </label>

                                        @if($countries->isNotEmpty())
                                            @foreach($countries as $country)
                                                <label class="d-block">
                                                    <input {{ in_array((string)$country->id,$CurrencyAgainstProduct) ? 'checked' : ''}} value="{{$country->id}}" type="checkbox"
                                                           class="continue_selling" name="countries[]" class="py-2">
                                                    <span class="py-2">
                                        {{$country['countries']['name']}} ({{$country->currency_code}})
                                              </span>
                                                    @endforeach
                                                    @else
                                                        <h6>
                                                            No category found
                                                        </h6>
                                                @endif
                                    </div>
                                    <button class="btn btn-primary  my-2 float-right">Save</button>
                                </div>
                            </div>
                            {{--Published / Draft /  Where --}}

                            {{--Category / Brand / SizeChart--}}
                            <div class="card">
                                <div class="body">
                                    <h5>
                                        Product organization
                                    </h5>
                                    <div class="form-group">
                                        <label for="email_address1">Categories</label>
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
                                    <div class="form-group ">
                                        <label for="email_address1">Brands</label>
                                        <select class="form-control select2" name="brand_id"
                                                data-placeholder="Select" required>
                                            <option value=""> select</option>
                                            @foreach($brands as $brand)
                                                <option {{$product->brands->brand_id == $brand->id ? 'Selected' : '' }} value={{$brand->id}}>{{$brand->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <div class="testing">
                                            <label for="email_address1">Size chart</label>
                                            <select id="chartappend" class="form-control select2" name="chart_id"
                                                    data-placeholder="Select" required>
                                                <option value=""> select</option>
                                                <option value="add"> Add other</option>
                                                @foreach($chartsize as $charts)
                                                    <option {{$product->chart_id == $charts->id ? 'selected': ''}} value={{$charts->id}}>{{$charts->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-4 chart">
                                                <button type="button" id="modal" class="btn btn-primary d-none"
                                                        data-toggle="modal"
                                                        data-target="#exampleModal">Modal
                                                    With Form
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-lg-12 mx-auto">
                                            <div class="test">
                                                <label class="d-block">
                                                    <input {{$product->continue_selling == '1' ? 'checked' : ''}} value="1"
                                                           type="checkbox" class="continue_selling"
                                                           name="continue_selling">
                                                    <span>
                                                    continue selling ? when out of stock !!
                                                </span>
                                                </label>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-lg-12 mx-auto">
                                            <label for="email_address1"><strong>Product Tax</strong></label>
                                            <div class="form-line">
                                                <input value="{{$product->product_tax}}" type="text" id="erp_question_text"
                                                       class="form-control" name="product_tax"
                                                       placeholder="Enter Product Tax">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Category / Brand / SizeChart--}}

                            {{--Media Gallery--}}
                            <div class="card">
                                <div class="body">
                                    <h5>Media Gallery</h5>
                                    <div class="multiimage">

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
                                                            @if($media != null)
                                                                @foreach($media as $med)
                                                                    @if($med == null)
                                                                    @else
                                                                        <img class="main_img d-block w-100 h-100 position-absolute" src="{{asset('images/media'.'/'.$med->image)}}" alt="">
                                                                    @endif
                                                                @endforeach
                                                        </div>
                                                    </div>
                                                    @else
                                                        <a class="btn mt-3 remove_lol fw-normal border-0 shadow-none" data-id="{{$med->id}}">Remove</a>
                                                    @endif
                                                </div>
                                                <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>

                                                <a class="btn mt-3  fw-normal add_clone border-0 shadow-none">Add
                                                    More</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Media Gallery--}}
                    </div>
                </form>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="formModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="xyz" method="post" name="myForm" enctype="multipart/form-data">
                                    <label for="email_address1">Title</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="title"
                                                   class=" form-control"
                                                   placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="multiimage">

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
                                                        <input id="chart_img" type="file" name="chart_img"
                                                               class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                                        <div class="img-thumb">
                                                        </div>
                                                    </div>
                                                    <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-info waves-effect chartclone">Save
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect"
                                                data-dismiss="modal">Cancel
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>


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


                <script>
                    // fetchdata();

                    {{--function fetchdata()--}}
                    {{--{--}}
                    {{--    $.ajax({--}}
                    {{--        type: "GET",--}}
                    {{--        url: "{{url('charts') }}",--}}
                    {{--        dataType: "json",--}}
                    {{--        success: function(response) {--}}

                    {{--            console.log(response);--}}
                    {{--            $('#chartappend').empty();--}}
                    {{--            $('#chartappend').append(`--}}
                    {{--                        <option value="">select</option>--}}
                    {{--                         <option value="add">add new</option>`--}}
                    {{--            );--}}
                    {{--            $.each(response.data,function(key,item)--}}
                    {{--            {--}}

                    {{--                $('#chartappend').append(`--}}
                    {{--                        <option value=${item.id}>${item.name}</option>`--}}
                    {{--                );--}}
                    {{--            });--}}
                    {{--        }--}}
                    {{--    });--}}
                    {{--}--}}
                    $(document).ready(function () {
                        $('.chartclone').on('click', function (event) {
                            event.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "{{route('size_chart.store')}}",
                                type: "POST",
                                data: $('#xyz').serialize(),
                                dataType: "json",
                                success: function (response) {

                                    let val = $("#xyz input[name='title']").val();
                                    $('#chartappend').append(`
                                        <option selected value=${response.id}> ${response.name}</option>`
                                    );
                                    $('#xyz').trigger('reset');
                                    $('.close').click();
                                    // fetchdata();
                                }
                            });
                        });
                    });

                </script>
                {{--                Chart Size Modal --}}
                <script>
                    $(document).ready(function () {

                        $('.chart').hide();
                        $('.testing select').on('change', function () {
                                //  alert( this.value ); // or $(this).val()

                                if ($(this).val() == "add") {
                                    $(this).parents('.testing').find('.chart').show();
                                    $('.hid').attr('required', true);
                                    $('#title').attr('required', true);
                                    $('#modal').click();
                                } else {
                                    $('.chart').hide();
                                    $('.hid').attr('required', false);
                                }
                            }
                        )
                    });
                </script>
                {{--                Chart Size Modal --}}
                {{--Media Script--}}
                <script>
                    $(document).ready(function () {
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
                {{--Media Script--}}
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
                                                                            <div class="col-11">
                                                                                <div class="row">
                                                                                    <?php
                                $count = 0;
                                //                                                                                    $var = 'meta';
                                ?>
                                @foreach($variation as $key => $node)



                                <div class="col-3">
                                    <label for="email_address1">{{$node->attribute_name}} </label>

                                            <select class="form-control"
                                                      name="variation_option[${x}][{{$node->id}}][{{$node->attribute_name}}]"
                                                  data-placeholder="Select">
                                     @foreach(json_decode($node->variations) as $row)
                                <option {{ old('status') == 1 ? 'Selected' : '' }}
                                value="{{$row}}">
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
                            <div class="col-1 d-flex align-items-center justify-content-center">
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
                                                                                <div class="row my-1">
                                        <div class=" col-12">
                                            <label for="email_address1">country </label>
                                            <select class="form-control select2" name="country_var[${x}]" id="Quiz-type"
                                                    data-placeholder="Select">


                                </select>
                            </div>
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
