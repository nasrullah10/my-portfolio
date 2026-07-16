<section class="nx-section nx-experience">
    <div class="nx-container">
        <div class="nx-experience__grid">
            @if($experience->image)
                <figure class="nx-experience__photo d-none d-lg-block" data-aos="fade-right">
                    <img src="{{ asset($experience->image) }}" alt="{{ $experience->title }}">
                </figure>
            @endif
            <div>
                <p class="nx-eyebrow" data-aos="fade-up">Experience</p>
                <h2 class="nx-heading" data-aos="fade-up" data-aos-delay="80">{{ $experience->title }}</h2>
                <div class="nx-prose" data-aos="fade-up" data-aos-delay="140">
                    {!! $experience->description !!}
                </div>
                <div class="nx-contact-pills" data-aos="fade-up" data-aos-delay="200">
                    <a href="tel:{{ $experience->phone }}" class="nx-pill">
                        <i class="fas fa-phone"></i>
                        <span>{{ $experience->phone }}</span>
                    </a>
                    <a href="mailto:{{ $experience->email }}" class="nx-pill">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $experience->email }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
