@extends('frontend.layouts.master')
@section('title', $portfolio->title)
@section('content')

<header class="nx-pagehead">
    <div class="nx-container nx-pagehead__inner">
        <div>
            <p class="nx-eyebrow">Case study</p>
            <h1 class="nx-heading nx-heading--light">{{ $portfolio->title }}</h1>
        </div>
        <nav class="nx-crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('portfolio') }}">Portfolio</a>
        </nav>
    </div>
</header>

<section class="nx-section nx-detail">
    <div class="nx-container nx-detail__wrap">
        <figure class="nx-detail__media">
            <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}">
        </figure>

        <div class="nx-detail__meta">
            <div>
                <span>Client</span>
                <strong>{{ $portfolio->client }}</strong>
            </div>
            <div>
                <span>Date</span>
                <strong>{{ date('d M, Y', strtotime($portfolio->created_at)) }}</strong>
            </div>
            <div>
                <span>Website</span>
                <strong><a href="{{ $portfolio->website }}" target="_blank" rel="noopener">{{ $portfolio->website }}</a></strong>
            </div>
            <div>
                <span>Category</span>
                <strong>{{ $portfolio->category->name }}</strong>
            </div>
        </div>

        <div class="nx-prose nx-detail__body">
            {!! $portfolio->description !!}
        </div>
    </div>
</section>
@endsection
