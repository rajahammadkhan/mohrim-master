<div class="single_footer single_footer_address">
    <h4 class="mb-2">E MAIL NEWS LETTER</h4>
    <p class="expiry text-light">
        Be The First To Get The Amazin Deals
    </p>
    <div class="signup_form">
        <form action="#" class="subscribe newsletter">
            <input type="text" class="subscribe__input" placeholder="Enter Email Address">
            <button type="button"  class="subscribe__btn newsletter-subscribe"><i
                        class="fas fa-paper-plane"></i></button>
            <div class="error"></div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(document).on('click', '.newsletter-subscribe', function () {
            var email = $(this).parents('.newsletter').find('input').val();
            var error = $(this).parents('.newsletter').find('.error');
            if(email) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('newsletter')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email,

                    },
                    dataType: "json",
                    // beforeSend: function () {
                    //     $(".ajaxpreload").show();
                    // },
                    success: function (data) {
                        console.log(data);
                        if(data == 2){
                            $(error).html('<p class="px-3 py-2 mt-2 bg-danger text-white">You are already a Subscriber, Thank You</p>');


                        }
                        else if (data != false) {
                            $(error).html('<p class="px-3 py-2 mt-2 bg-success text-white">Thanks For Subscribing</p>');

                        }
                        else if(data == false) {
                            $(error).html('<p class="px-3 py-2 mt-2 bg-danger text-white">Please Enter a Correct Email</p>');


                        }
                    }
                });
            }else{
                $(error).html('<p class="px-3 py-2 mt-2 bg-danger text-white">Something Went Wrong</p>');

            }


        });
    });

</script>
