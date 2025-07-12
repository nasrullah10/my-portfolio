<section class="contact-area section-padding" id="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle">{{ __('Contact Me') }}</span>
                    <h2 class="title">{{ __('Get In Touch') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Contact-Form -->
                <form class="contact-form" id="contact-form">
                    <div class="row">
                        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="100">
                            <div class="form-box">
                                <input type="text" name="name" id="form-name" class="input-box"
                                    placeholder="Name">
                                <label for="form-name" class="icon lb-name"><i class="fal fa-user"></i></label>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="200">
                            <div class="form-box">
                                <input type="text" name="email" id="form-email" class="input-box"
                                    placeholder="Email">
                                <label for="form-email" class="icon lb-email"><i class="fal fa-envelope"></i></label>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="300">
                            <div class="form-box">
                                <input type="text" name="subject" id="form-subject" class="input-box"
                                    placeholder="Subject">
                                <label for="form-subject" class="icon lb-subject"><i class="fal fa-check-square"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-12" data-aos="zoom-in-up" data-aos-delay="400">
                            <div class="form-box">
                                <textarea class="input-box" id="form-message" placeholder="Message"
                                    cols="30" rows="4" name="message"></textarea>
                                <label for="form-message" class="icon lb-message"><i class="fal fa-edit"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-12" data-aos="zoom-in-up" data-aos-delay="500">
                            <div class="form-box">
                                <button type="submit" class="button-primary mouse-dir" id="submit_btn"> <span class="icon"><i class="fal fa-paper-plane"></i></span> <span class="text">Send</span> <span class="dir-part"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact-Form / -->
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
    $(document).ready(function(){
        // Csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#contact-form', function(e){
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: "{{route('contact')}}",
                    data: $(this).serialize(),
                    beforeSend: function(){
                        $('#submit_btn').prop("disabled", true);
                        $('#submit_btn').text('Loading...');
                    },
                    success: function(response){
                        console.log(response);
                        if(response.status == 'success'){
                            toastr.success(response.message);
                            $('#submit_btn').prop("disabled", false);
                            $('#submit_btn').text('Send Now');
                            $('#contact-form').trigger('reset');
                        }
                    },
                    error: function(response){
                       if(response.status == 422){
                        let errorsMessage = $.parseJSON(response.responseText);

                        $.each(errorsMessage.errors, function(key, val){
                            console.log(val[0]);
                            toastr.error(val[0])
                        })
                        $('#submit_btn').prop("disabled", false);
                        $('#submit_btn').text('Send Now');

                       }
                    }
            })
        })
    })

</script>
@endpush
