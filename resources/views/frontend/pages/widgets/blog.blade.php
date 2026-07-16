<section class="nx-section nx-blog" id="blog-page">
    <div class="nx-container">
        <div class="nx-section__head nx-section__head--center" data-aos="fade-up">
            <p class="nx-eyebrow">Journal</p>
            <h2 class="nx-heading">{{ $blogTitle->title }}</h2>
            <p class="nx-lead nx-lead--dark">{{ $blogTitle->sub_title }}</p>
        </div>

        <div class="blog-slider nx-blog__slider" data-aos="fade-up" data-aos-delay="100">
            @foreach ($blogs as $blog)
                <article class="nx-post single-blog">
                    <a href="{{ route('show.blog', $blog->id) }}" class="nx-post__media">
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    </a>
                    <div class="nx-post__body blog-content">
                        <h3 class="nx-post__title title">
                            <a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title }}</a>
                        </h3>
                        <div class="nx-post__excerpt desc">
                            <p>{!! Str::limit(strip_tags($blog->description), 120, '...') !!}</p>
                        </div>
                        <a href="{{ route('show.blog', $blog->id) }}" class="nx-text-link">Read more</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
