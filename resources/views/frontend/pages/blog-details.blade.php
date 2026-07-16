@extends('frontend.layouts.master')
@section('title', $blog->title)
@section('content')

<header class="nx-pagehead">
    <div class="nx-container nx-pagehead__inner">
        <div>
            <p class="nx-eyebrow">{{ $blog->getCategory->name }}</p>
            <h1 class="nx-heading nx-heading--light">{{ $blog->title }}</h1>
        </div>
        <nav class="nx-crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('blog') }}">Blog</a>
        </nav>
    </div>
</header>

<section class="nx-section nx-detail">
    <div class="nx-container nx-detail__wrap">
        <div class="nx-detail__meta">
            <div>
                <span>Published</span>
                <strong>{{ date('d M, Y', strtotime($blog->created_at)) }}</strong>
            </div>
            <div>
                <span>Category</span>
                <strong>{{ $blog->getCategory->name }}</strong>
            </div>
        </div>

        <figure class="nx-detail__media">
            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
        </figure>

        <div class="nx-prose nx-detail__body">
            {!! $blog->description !!}
        </div>

        <div class="nx-detail__nav">
            @if ($previousPost)
                <a href="{{ route('show.blog', $previousPost->id) }}" class="nx-btn nx-btn--outline">
                    ← {{ Str::limit($previousPost->title, 28) }}
                </a>
            @endif
            @if ($nextPost)
                <a href="{{ route('show.blog', $nextPost->id) }}" class="nx-btn nx-btn--outline">
                    {{ Str::limit($nextPost->title, 28) }} →
                </a>
            @endif
        </div>
    </div>
</section>

@include('frontend.pages.widgets.quote')
@endsection
