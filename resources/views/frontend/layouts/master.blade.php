@php
    $seoSetting = \App\Models\SeoSetting::first();
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | @yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @include('frontend.layouts.inc.style')
</head>
<body class="nx-body {{ request()->routeIs('home') ? 'nx-home' : 'nx-inner' }}">

@include('frontend.layouts.inc.loader')

<header class="nx-nav main_menu {{ request()->routeIs('home') ? 'nx-nav--home' : 'nx-nav--inner' }}" id="main_menu_area">
    <div class="nx-container nx-nav__inner">
        <a class="nx-logo" href="{{ route('home') }}">
            <span class="nx-logo__mark">N</span><span class="nx-logo__text">asrullah</span>
        </a>

        <button class="nx-nav__toggle" type="button" aria-label="Open menu" aria-expanded="false" data-nx-nav-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="nx-nav__menu" data-nx-nav-menu>
            @if(request()->routeIs('home'))
                <a href="#home-page" class="is-active">Home</a>
                <a href="#about-page">About</a>
                <a href="#portfolio-page">Work</a>
                <a href="#skills-page">Skills</a>
                <a href="#blog-page">Blog</a>
                <a href="#contact-page" class="nx-nav__cta">Contact</a>
            @else
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio*') || request()->routeIs('show.portfolio') ? 'is-active' : '' }}">Work</a>
                <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') || request()->routeIs('show.blog') ? 'is-active' : '' }}">Blog</a>
                <a href="{{ route('home') }}#contact-page" class="nx-nav__cta">Contact</a>
            @endif
        </nav>
    </div>
</header>

<main class="nx-main">
    @yield('content')
</main>

@include('frontend.layouts.inc.footer')

@include('frontend.layouts.inc.script')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    window.addEventListener('load', () => {
        const loader = document.querySelector('.nx-loader');
        if (!loader) return;
        setTimeout(() => {
            loader.classList.add('out');
            document.body.classList.add('nx-ready');
            setTimeout(() => loader.remove(), 1000);
        }, 500);
    });

    AOS.init({ duration: 900, once: true, offset: 50, easing: 'ease-out-cubic' });

    (function () {
        const toggle = document.querySelector('[data-nx-nav-toggle]');
        const menu = document.querySelector('[data-nx-nav-menu]');
        if (!toggle || !menu) return;
        toggle.addEventListener('click', () => {
            const open = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.classList.toggle('is-open', open);
        });
        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                menu.classList.remove('is-open');
                toggle.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    })();
</script>
</body>
</html>
