@extends('management.layouts.master')
@section('title')
    Categories
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

        /*
</style>
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Categories</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                @php
                    $bl = $_GET['type'];
                @endphp
                <form action="{{route('categories.store')}}?type={{$bl}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @php
                            @endphp

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card py-4">

                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Title </strong></label>
                                            <div class="form-line">
                                                <input type="text" id="erp_question_text"
                                                       class="form-control" name="title"
                                                       placeholder="Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Description </strong></label>
                                            <textarea value="{{old('erp_order_message') }}" type="text"
                                                      name="description"
                                                      id="erp_order_message" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card py-4">

                                <div class="header">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="form-outline">
                                                    <input type="search" id="keybut" placeholder="Search Products"/>
                                                </div>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group">
                                                <div class="form-outline">
                                                    <input type="search" id="form1" placeholder="Browser"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group">
                                                <div class="form-outline">
                                                    <input type="number" id="form1" placeholder="Sort:Best selling"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table>
                                                <tbody class="searchDataList"></tbody>
                                            </table>
                                            <button type="button" class="btn btn-primary  my-2 float-right btnsav">Save</button>
                                        </div>
                                    </div>
                                    {{--                                    <div class="row my-2">--}}
                                    {{--                                        <div class=" col-12">--}}
                                    {{--                                            <label for="email_address1">   <strong>  Meta Description </strong></label>--}}
                                    {{--                                            <textarea value="{{old('erp_order_message') }}" type="text" name="meta_description"--}}
                                    {{--                                                      id="erp_order_message"  class="ckeditor form-control choices" cols="30"--}}
                                    {{--                                                      rows="10"--}}
                                    {{--                                            ></textarea>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="row my-4">--}}
                                    {{--                                        <div class=" col-12">--}}
                                    {{--                                            <label for="email_address1"> <strong> Meta Keywords </strong></label>--}}

                                    {{--                                            <div class="form-line">--}}
                                    {{--                                                <input type="text" id="erp_question_text"--}}
                                    {{--                                                       class="form-control" name="meta_keywords"--}}
                                    {{--                                                       placeholder="Meta Keywords">--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                </div>
                            </div>
                            <div class="card py-4">

                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Title </strong></label>
                                            <div class="form-line">
                                                <input type="text" id="erp_question_text"
                                                       class="form-control" name="meta_title"
                                                       placeholder="Meta Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Description </strong></label>
                                            <textarea value="{{old('erp_order_message') }}" type="text"
                                                      name="meta_description"
                                                      id="erp_order_message" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10"
                                            ></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Keywords </strong></label>

                                            <div class="form-line">
                                                <input type="text" id="erp_question_text"
                                                       class="form-control" name="meta_keywords"
                                                       placeholder="Meta Keywords">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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
                                                <option {{ old('duration') == 'days' ? 'Selected' : '' }}  value=1>
                                                    Publish
                                                </option>
                                                <option {{ old('duration') == 'week' ? 'Selected' : '' }}  value=0>
                                                    draft
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1">Parent Category</label>
                                            <select class="form-control select2" name="parent_category" id="Quiz-type"
                                                    data-placeholder="Select">
                                                <option value=""> select</option>
                                                @foreach($cate as $row)

                                                    @php
                                                        $rr = base64_decode($bl);
                                                    @endphp

                                                    @if($row->reference_type == $rr)

                                                        <option value={{$row->id}}>{{$row->title}}</option>

                                                    @endif

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row my-3">

                                        <div class="col-lg-12 mx-auto">

                                            <!-- Upload image input-->
                                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                <input id="upload" name="image" type="file" onchange="readURL(this);"
                                                       class="form-control border-0">
                                                <label id="upload-label" for="upload"
                                                       class="font-weight-light text-muted"></label>
                                                <div class="input-group-append">
                                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                                                class="text-uppercase font-weight-bold text-muted">Choose
                                                            file</small></label>
                                                </div>
                                            </div>

                                            <!-- Uploaded image area-->
                                            <p class="font-italic text-white text-center">The image uploaded will be
                                                rendered inside the box below.</p>
                                            <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                                                              class="img-fluid rounded shadow-sm mx-auto d-block">
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <script>
                    $(document).ready(function () {
                        $('body').on('keyup', '#keybut', function () {
                            var word = $(this).val();
                            if (!word && word==="") {
                                $('tbody.searchDataList').empty();
                            } else {
                                $.ajax({
                                    url: "{{url('SearchKey').'?type='.$_GET['type'] }}",
                                    type: "GET",
                                    data: {
                                        _token: '{{csrf_token()}}',
                                        search: word
                                    },
                                    contentType: "application/json",
                                    success: function (data) {
                                        jQuery.each(data, function (index, item) {
                                            $('tbody.searchDataList').append(
                                                `<tr class="list_parent">
                                                    <td><label class="d-block"><input type="checkbox" class="continue_selling itmList"><span class="py-2">
                                                    <td><img src="{{asset('images/media')}}/${item.image}" height="60px" width="60px" alt="Image"></td>
                                                    <td>${item.title}</td>
                                                    <td class="itmId">${item.id}</td>
                                                    <td><label class="badge badge-${item.status === "1" ? "info" : "danger"}" data-toggle="modal" data-target="#active_inactive">${item.status === "1" ? "Publish" : "Draft"}</label></td>
                                                    <td><button type="button" class="close" onclick="$(this).closest('tr.list_parent').remove()">&times;</button></td>
                                                    </span></label></td>
                                                 </tr>`);
                                        });
                                    }
                                });
                            }
                        });
                    });

                        $(".btnsav").click(function() {
                            var val = $('input.itmList:checked').parents('.list_parent').find(".itmId").text();
                            $.ajax({
                                type: 'POST',
                                url: '{{url('ProductInCategory')}}',
                                data: {
                                    _token: '{{csrf_token()}}',
                                    id:val,
                        },
                            success: function(data){
                                console.log('gya');
                            }
                        });

                        });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#imageResult')
                                    .attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $(function () {
                        $('#upload').on('change', function () {
                            readURL(input);
                        });
                    });

                    /*  ==========================================
                        SHOW UPLOADED IMAGE NAME
                    * ========================================== */
                    var input = document.getElementById('upload');
                    var infoArea = document.getElementById('upload-label');

                    input.addEventListener('change', showFileName);

                    function showFileName(event) {
                        var input = event.srcElement;
                        var fileName = input.files[0].name;
                        infoArea.textContent = 'File name: ' + fileName;
                    }

                </script>


@endsection

