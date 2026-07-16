@extends('frontend.layouts.master')
@section('title', 'Portfolio')
@section('content')

<header class="nx-pagehead">
    <div class="nx-container nx-pagehead__inner">
        <div>
            <p class="nx-eyebrow">Work</p>
            <h1 class="nx-heading nx-heading--light">Portfolio</h1>
        </div>
        <nav class="nx-crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span>Portfolio</span>
        </nav>
    </div>
</header>

<section class="nx-section nx-work">
    <div class="nx-container">
        <ul class="filter-menu nx-filters">
            <li class="active" data-filter="*">All</li>
            @foreach ($portfolioCategories as $category)
                <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
            @endforeach
        </ul>

        <div class="portfolio-wrapper">
            <div class="row portfolios nx-work__grid g-4">
                @foreach ($portfolioItems as $item)
                    <div class="col-md-6 col-lg-4 filter-item {{ $item->category->slug }}">
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
                            <a href="{{ asset($item->image) }}" data-lity class="nx-card__zoom" aria-label="Preview">
                                <i class="fas fa-expand"></i>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('frontend.pages.widgets.quote')
@endsection
