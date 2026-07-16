<section class="nx-section nx-voices">
    <div class="nx-container">
        <div class="nx-section__head nx-section__head--center" data-aos="fade-up">
            <p class="nx-eyebrow">Testimonials</p>
            <h2 class="nx-heading nx-heading--light">{{ $feedbackTitle->title }}</h2>
            <p class="nx-lead">{{ $feedbackTitle->sub_title }}</p>
        </div>

        <div class="testimonial-slider nx-voices__slider" data-aos="fade-up" data-aos-delay="100">
            @foreach ($feedbacks as $feedback)
                <div class="nx-voice single-testimonial">
                    <div class="nx-voice__quote"><i class="fas fa-quote-left"></i></div>
                    <h3 class="nx-voice__name title">{{ $feedback->name }}</h3>
                    <p class="nx-voice__role position">{{ $feedback->position }}</p>
                    <div class="nx-voice__text content">{!! $feedback->description !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
