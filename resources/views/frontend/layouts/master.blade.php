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
    <style>
        .whatsapp-wrapper{
            position:fixed;
            right:25px;
            bottom:120px;   /* 40px se 120px */
            z-index:9999;
        }
                .nx-whatsapp-sticky{
            position:fixed;
            right:25px;
            top:50%;
            transform:translateY(-50%);
            z-index:9999;
            text-decoration:none;
        }

        /* Icon */

        .nx-whatsapp-icon{
            width:60px;
            height:60px;
            border-radius:50%;
            background:#25D366;

            display:flex;
            justify-content:center;
            align-items:center;

            color:#fff;
            font-size:30px;

            box-shadow:0 10px 30px rgba(37,211,102,.35);

            transition:.35s;
            animation:whatsappPulse 2s infinite;
        }

        .nx-whatsapp-icon:hover{
            transform:scale(1.08);
        }

        /* Tooltip */

        .nx-whatsapp-tooltip{
            position:absolute;
            top:50%;
            right:75px;

            transform:translateY(-50%) translateX(20px);

            background:#1b1b1b;
            color:#fff;

            padding:12px 18px;
            border-radius:40px;

            white-space:nowrap;

            font-size:14px;
            font-weight:600;

            opacity:0;
            visibility:hidden;

            transition:.35s;
            box-shadow:0 8px 20px rgba(0,0,0,.25);
        }

        .nx-whatsapp-tooltip::after{
            content:'';
            position:absolute;
            right:-6px;
            top:50%;
            transform:translateY(-50%) rotate(45deg);

            width:12px;
            height:12px;
            background:#1b1b1b;
        }

        .nx-whatsapp-sticky:hover .nx-whatsapp-tooltip{
            opacity:1;
            visibility:visible;
            transform:translateY(-50%) translateX(0);
        }

        /* Pulse */

        @keyframes whatsappPulse{

            0%{
                box-shadow:0 0 0 0 rgba(37,211,102,.5);
            }

            70%{
                box-shadow:0 0 0 18px rgba(37,211,102,0);
            }

            100%{
                box-shadow:0 0 0 0 rgba(37,211,102,0);
            }

        }

        @media(max-width:768px){

            .nx-whatsapp-sticky{
                right:15px;
            }

            .nx-whatsapp-icon{
                width:54px;
                height:54px;
                font-size:28px;
            }

            .nx-whatsapp-tooltip{
                display:none;
            }

        }
    </style>
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
<a href="https://wa.me/923152401099?text=Hi%20Nasrullah,%20I%20want%20to%20discuss%20a%20project."
   target="_blank"
   class="nx-whatsapp-sticky"
   aria-label="Chat on WhatsApp">

    <span class="nx-whatsapp-tooltip">
         Let's Chat 👋
    </span>

    <span class="nx-whatsapp-icon">
        <i class="fab fa-whatsapp"></i>
    </span>

</a>
</body>
</html>
