<section class="nx-section nx-skills" id="skills-page">
    <div class="nx-container">
        <div class="nx-skills__grid">
            <div>
                <div class="nx-section__head" data-aos="fade-up">
                    <p class="nx-eyebrow">{{ __('My Skills') }}</p>
                    <h2 class="nx-heading">{{ __('What I Know') }}</h2>
                    <div class="nx-prose"><p>{{ $skill->sub_title }}</p></div>
                </div>
                <div class="nx-skills__list">
                    @foreach ($skillItems as $item)
                        <div class="nx-skill bar_group" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 50, 250) }}">
                            <span class="title">{{ $item->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            @if($skill->image)
                <figure class="nx-skills__photo d-none d-lg-block" data-aos="fade-left">
                    <img src="{{ asset($skill->image) }}" alt="Skills">
                </figure>
            @endif
        </div>
    </div>
</section>
