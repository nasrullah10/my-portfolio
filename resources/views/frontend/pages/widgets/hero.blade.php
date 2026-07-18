<section class="nx-hero" id="home-page"
    style="--hero-image: @if($hero && $hero->image) url('{{ asset($hero->image) }}') @else none @endif;">
    <div class="nx-hero__media" aria-hidden="true"></div>
    <div class="nx-hero__veil" aria-hidden="true"></div>
    <div class="nx-hero__orb nx-hero__orb--a" aria-hidden="true"></div>
    <div class="nx-hero__orb nx-hero__orb--b" aria-hidden="true"></div>
    <div class="nx-hero__sparkles" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>

    <div class="nx-container nx-hero__content">
        <p class="nx-hero__chip" data-aos="fade-up">Available for freelance</p>
        <p class="nx-hero__brand" data-aos="fade-up" data-aos-delay="60">Nasrullah</p>
        <h1 class="nx-hero__title typer-title" data-aos="fade-up" data-aos-delay="120">I'm ui/ux designer</h1>
        <p class="nx-hero__lead" data-aos="fade-up" data-aos-delay="180">{{ $hero->sub_title }}</p>

        <div class="nx-hero__actions" data-aos="fade-up" data-aos-delay="240">
            @if($hero->btn_text)
                <a href="{{ route('resume.download') }}" target="_blank" rel="noopener" class="nx-btn nx-btn--lime">
                    {{ $hero->btn_text }}
                </a>
            @endif
           <a href="https://wa.me/923152401099?text=Hi%20Nasrullah,%20I%20want%20to%20hire%20you."
            target="_blank"
            class="nx-btn nx-btn--ghost">
                Hire Me
            </a>
        </div>
    </div>

    <!-- <a href="#about-page" class="nx-hero__scroll" aria-label="Scroll down">
        <span>Scroll</span>
    </a> -->
</section>

@push('scripts')
<script>
    @php
        $titles = [];
        foreach($typerTitles as $title){
            $titles[] = $title->title;
        }
        $titles = json_encode($titles);
    @endphp
    $('.nx-hero .typer-title').typer({!! $titles !!});
</script>
@endpush
