<section class="nx-section nx-contact" id="contact-page">
    <div class="nx-container nx-contact__wrap">
        <div class="nx-section__head nx-section__head--center" data-aos="fade-up">
            <p class="nx-eyebrow">{{ __('Contact Me') }}</p>
            <h2 class="nx-heading">{{ __('Get In Touch') }}</h2>
        </div>

        <form class="nx-form contact-form" id="contact-form" data-aos="fade-up" data-aos-delay="100">
            <div class="nx-form__row">
                <div class="nx-field">
                    <label for="form-name">Name</label>
                    <input type="text" name="name" id="form-name" placeholder="Your name" required>
                </div>
                <div class="nx-field">
                    <label for="form-email">Email</label>
                    <input type="email" name="email" id="form-email" placeholder="you@email.com" required>
                </div>
                <div class="nx-field">
                    <label for="form-subject">Subject</label>
                    <input type="text" name="subject" id="form-subject" placeholder="What’s this about?">
                </div>
            </div>
            <div class="nx-field">
                <label for="form-message">Message</label>
                <textarea id="form-message" name="message" rows="5" placeholder="Tell me about your project" required></textarea>
            </div>
            <div class="nx-form__actions">
                <button type="submit" class="nx-btn nx-btn--lime" id="submit_btn">
                    <span class="text">Send Message</span>
                </button>
            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(document).on('submit', '#contact-form', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact') }}",
                data: $(this).serialize(),
                beforeSend: function () {
                    $('#submit_btn').prop('disabled', true);
                    $('#submit_btn .text').text('Sending...');
                },
                success: function (response) {
                    if (response.status == 'success') {
                        toastr.success(response.message);
                        $('#submit_btn').prop('disabled', false);
                        $('#submit_btn .text').text('Send Message');
                        $('#contact-form').trigger('reset');
                    }
                },
                error: function (response) {
                    if (response.status == 422) {
                        let errorsMessage = $.parseJSON(response.responseText);
                        $.each(errorsMessage.errors, function (key, val) {
                            toastr.error(val[0]);
                        });
                        $('#submit_btn').prop('disabled', false);
                        $('#submit_btn .text').text('Send Message');
                    }
                }
            });
        });
    });
</script>
@endpush
