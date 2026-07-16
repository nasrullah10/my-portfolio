<section class="nx-section nx-work" id="portfolio-page">
    <div class="nx-container">
        <div class="nx-section__head nx-section__head--center" data-aos="fade-up">
            <p class="nx-eyebrow">Selected work</p>
            <h2 class="nx-heading">{{ $portfolioTitle->title }}</h2>
            <div class="nx-prose nx-prose--center">{!! $portfolioTitle->sub_title !!}</div>
        </div>

        <ul class="filter-menu nx-filters" data-aos="fade-up" data-aos-delay="80">
            <li class="active" data-filter="*">All</li>
            @foreach ($portfolioCategories as $category)
                <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
            @endforeach
        </ul>

        <div class="portfolio-wrapper">
            <div class="row portfolios nx-work__grid g-4">
                @foreach ($portfolioItems as $item)
                    <div class="col-md-6 col-lg-4 filter-item {{ $item->category->slug }}" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 70, 280) }}">
                        <article class="nx-card">
                            <a href="{{ route('show.portfolio', $item->id) }}" class="nx-card__link">
                                <figure class="nx-card__media">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                </figure>
                                <div class="nx-card__body">
                                    <h3 class="nx-card__title">{{ $item->title }}</h3>
                                    <p class="nx-card__text">{!! Str::limit(strip_tags($item->description), 90) !!}</p>
                                </div>
                            </a>
                            <a href="{{ asset($item->image) }}" data-lity class="nx-card__zoom" aria-label="Preview image">
                                <i class="fas fa-expand"></i>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="nx-section__foot" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="nx-btn nx-btn--outline">View all projects</a>
        </div>
    </div>
</section>
