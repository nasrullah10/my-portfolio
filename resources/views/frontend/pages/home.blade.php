@extends('frontend.layouts.master')
@section('title', 'Home')

@section('content')
@include('frontend.pages.widgets.hero')
@include('frontend.pages.widgets.about')
@include('frontend.pages.widgets.portfolio')
@include('frontend.pages.widgets.skills')
@include('frontend.pages.widgets.experience')
@include('frontend.pages.widgets.testimonial')
@include('frontend.pages.widgets.blog')
@include('frontend.pages.widgets.contact')
@endsection
