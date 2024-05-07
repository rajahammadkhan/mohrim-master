@extends('management.layouts.master')
@section('title')
    edit related product
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
                                <h4 class="page-title">Related Products Edit</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card py-4">

                            <div class="header">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <div class="form-outline">
                                                <input type="text" class="form-control" placeholder="Search product" id="search">
                                            </div>
                                            <button type="button" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{route('related-products.update',$id)}}" id="mainSearchForm"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary  my-2 float-right btnsav">
                                                Save
                                            </button>
                                            <table>
                                                <tbody class="searchDataList"></tbody>
                                            </table>
                                           </form>
                                            <table>
                                                <tbody class="searchData">
                                                    @foreach($relatedProduct as $value)
                                                    <tr class="list_parent">
                                                    <input type="hidden" class="p_id" id="p_id" value="{{$id}}">
                                                   <td><label class="d-block"><input type="checkbox" {{$value->product == $value->product_id ? 'checked' : '' }} class="continue_selling itmList"><span class="py-2"></span></label></td>
                                                    <td>{{$value->title}}</td>
                                                    <td><input type="text" name="option_name[{{$value->id}}]" value="{{$value->option_name}}" class="option_name"></td>
                                                    <td><img src="{{asset('images/media')}}/{{$value->image}}" height="60px" width="60px" alt="Image"></td>
                                                    <td><label class="badge badge-{{$value->status === "1" ? "info" : "danger"}}" data-toggle="modal" data-target="#active_inactive">{{$value->status === "1" ? "Publish" : "Draft"}}</label></td>
                                                    <td><button type="button" class="close" onclick="$(this).closest('tr.list_parent').remove()">&times;</button></td>
{{--                                                    </span></label></td>--}}
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
{{--                                        </form>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#search').on('keyup', function () {
            search();
        });
        search();

        function search() {
            var keyword = $('#search').val();
            $.post('{{ route("product.search") }}',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function (data) {
                    table_post_row(data);
                });
        }

        // table row with ajax
        function table_post_row(res) {
            let htmlView = '';
            var id = $('#p_id').val();
            // var productId = Array.from(document.querySelectorAll('.p_id')).pop().value;
            var opt_name = document.querySelectorAll('.option_name');
            const retVal = (el) => {
                val = [];
                for(var i = 0; i < el.length; i++)
                {
                    val.push(el[i].value);
                }
                return val;
                        }
            if (res.product.length <= 0) {
                htmlView += `
                           <tr>
                              <td colspan="4">No data Found Related to this Product.</td>
                          </tr>`;
            }
            $('tbody.searchData').html("");
            for (let i = 0; i < res.product.length; i++) {
                // console.log(res.product[i].parent_id,parseInt(id));
                // console.log(${id});
                //     htmlView += `
                // <tr>
                //        <td>`+ (i+1) +`</td>
                //        <td>`+res.product[i].title+`</td>
                // </tr>`;
                htmlView += `
                         <tr class="list_parent">
                         <td><label class="d-block"><input type="checkbox" ${res.product[i].parent_id == parseInt(id) ? 'checked' : ''} value="${res.product[i].id}" name="product_id[]" class="continue_selling itmList"><span class="py-2"
                         <td>${res.product[i].title}</td>
                          <td><input type="text" name="option_name[${res.product[i].id}]" value="${res.product[i].parent_id == parseInt(id) ? retVal(opt_name)[i] : ''}" id="option_name"></td>
                        <td><img src="{{asset('images/media')}}/${res.product[i].image}" height="60px" width="60px" alt="Image"></td>
                        <td><label class="badge badge-${res.product[i].status === "1" ? "info" : "danger"}" data-toggle="modal" data-target="#active_inactive">${res.product[i].status === "1" ? "Publish" : "Draft"}</label></td>
                        <td><button type="button" class="close" onclick="$(this).closest('tr.list_parent').remove()">&times;</button></td>
                        </span></label></td>
                     </tr>`;
            }
            $('tbody.searchDataList').html(htmlView);
        }

        {{--$(document).ready(function () {--}}
        {{--    $('body').on('keyup', '#keybut', function () {--}}
        {{--        var word = $(this).val();--}}
        {{--        var productId = 40;--}}
        {{--        // var productId = document.querySelectorAll('.p_id');--}}
        {{--        // var opt_name = Array.from(document.querySelectorAll('.option_name')).pop().value;--}}
        {{--        var opt_name = document.querySelectorAll('.option_name');--}}

        {{--        const retVal = (el) => {--}}
        {{--            val = [];--}}
        {{--            for(var i = 0; i < el.length; i++)--}}
        {{--            {--}}
        {{--                val.push(el[i].value);--}}
        {{--            }--}}
        {{--            return val;--}}
        {{--        }--}}

        {{--        console.log(retVal(opt_name));--}}

        {{--        if (!word && word === "") {--}}
        {{--            $('tbody.searchDataList').empty();--}}
        {{--        } else {--}}
        {{--            $('tbody.searchData').html("");--}}

        {{--            $.ajax({--}}
        {{--                url: `{{url('SearchEdit')}}`,--}}
        {{--                type: "GET",--}}
        {{--                data: {--}}
        {{--                    _token: '{{csrf_token()}}',--}}
        {{--                    search: word,--}}
        {{--                },--}}
        {{--                contentType: "application/json",--}}
        {{--                success: function (data) {--}}
        {{--                    jQuery.each(data, function (index, item) {--}}
        {{--                        // console.log(item.related,item.parent_id);--}}
        {{--                        $('tbody.searchDataList').append(--}}
        {{--                            `<tr class="list_parent">--}}
        {{--                                            <input type="hidden" id="p_id" name="p_id" value="${productId}">--}}
        {{--                                            <td><label class="d-block"><input type="checkbox" ${item.parent_id == productId ? 'checked' : ''}   value="${item.id}" name="product_id[]" class="continue_selling itmList"><span class="py-2">--}}
        {{--                                             <td>${item.title}</td>--}}
        {{--                                            <td><input type="text" name="option_name[${item.id}]" value="${item.parent_id == productId ? retVal(opt_name) : ''}" id="option_name"></td>--}}
        {{--                                            <td><img src="{{asset('images/media')}}/${item.image}" height="60px" width="60px" alt="Image"></td>--}}
        {{--                                            <td><label class="badge badge-${item.status === "1" ? "info" : "danger"}" data-toggle="modal" data-target="#active_inactive">${item.status === "1" ? "Publish" : "Draft"}</label></td>--}}
        {{--                                            <td><button type="button" class="close" onclick="$(this).closest('tr.list_parent').remove()">&times;</button></td>--}}
        {{--                                            </span></label></td>--}}
        {{--                                         </tr>`);--}}

        {{--                    });--}}
        {{--                }--}}

        {{--            });--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection
