<form action="{{url('post-comment')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="ReferenceId" value="{{base64_encode($ReferenceId)}}">
    <input type="hidden" name="ReferenceType" value="{{$ReferenceType}}">
    <div class="container-fluid px-0">
        @include('frontend/layouts/error')
        <div class="row  comment_box m-0 com_card">

            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-12 my-2 file pe-0">

                <div class="image-upload-wrap">
                    <input name="image" class="file-upload-input w-100 h-100" type='file' onchange="readURL(this);"
                           accept="image/*" />
                    <div class="drag-text">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="file-upload-content">
                    <img class="file-upload-image w-100" src="#" alt="your image" />
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-9 col-xm-12 col-12 my-2 comment">
                <!-- <input type="text" class="form-control shadow-none rounded-0 border border-muted"
                    placeholder="Type Comment Here..."> -->
                <textarea name="comment" style="resize: none;"
                          class="h-100 form-control py-2 shadow-none rounded-0 border border-muted"
                          placeholder="Type Comment Here..."></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3 text-end">
                <div class="submit_btn">
                    <button type="submit" class="btn custom_btn rounded-pill shadow-none bg-signature">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        }
    }

    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
