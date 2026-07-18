<section class="nx-section nx-about" id="about-page">
    <div class="nx-container">
        <div class="nx-about__grid">
            <figure class="nx-about__photo" data-aos="fade-right">
                <img src="{{ asset($about->image) }}" alt="{{ $about->title }}">
            </figure>
            <div class="nx-about__copy">
                <p class="nx-eyebrow" data-aos="fade-up">About</p>
                <h2 class="nx-heading" data-aos="fade-up" data-aos-delay="80">{{ $about->title }}</h2>
                <div class="nx-prose" data-aos="fade-up" data-aos-delay="140">
                    {!! $about->description !!}
                </div>
                <a href="{{ route('resume.download') }}" class="nx-btn nx-btn--dark" data-aos="fade-up" data-aos-delay="200">
                    Download Resume
                </a>
            </div>
        </div>
    </div>
</section>
