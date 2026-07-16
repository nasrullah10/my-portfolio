@extends('frontend.layouts.master')
@section('title', 'Blog')
@section('content')

<header class="nx-pagehead">
    <div class="nx-container nx-pagehead__inner">
        <div>
            <p class="nx-eyebrow">Journal</p>
            <h1 class="nx-heading nx-heading--light">Blog</h1>
        </div>
        <nav class="nx-crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span>Blog</span>
        </nav>
    </div>
</header>

<section class="nx-section nx-blog">
    <div class="nx-container">
        <div class="row g-4">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-xl-4">
                    <article class="nx-post single-blog">
                        <a href="{{ route('show.blog', $blog->id) }}" class="nx-post__media">
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                        </a>
                        <div class="nx-post__body">
                            <h3 class="nx-post__title">
                                <a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title }}</a>
                            </h3>
                            <div class="nx-post__excerpt">
                                <p>{!! Str::limit(strip_tags($blog->description), 140, '...') !!}</p>
                            </div>
                            <a href="{{ route('show.blog', $blog->id) }}" class="nx-text-link">Read more</a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="nx-pagination">
            {{ $blogs->links() }}
        </div>
    </div>
</section>

@include('frontend.pages.widgets.quote')
@endsection
