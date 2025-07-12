@php
    $generalSetting = \App\Models\GeneralSetting::first();
    $seoSetting = \App\Models\SeoSetting::first();
@endphp
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | @yield('title')</title>
    <!-- CSS here -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('frontend.layouts.inc.style')

    <style>
        /* Preloader Styles */
        .preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            background: #111;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.75s ease, visibility 0.75s ease;
        }

        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .bouncing-dots {
            display: flex;
            justify-content: center;
        }

        .bouncing-dots div {
            width: 16px;
            height: 16px;
            margin: 3px 6px;
            border-radius: 50%;
            background-color: #fff;
            opacity: 1;
            animation: bouncing-loader 0.6s infinite alternate;
        }

        @keyframes bouncing-loader {
            to {
                opacity: 0.1;
                transform: translateY(-16px);
            }
        }

        .bouncing-dots div:nth-child(2) {
            animation-delay: 0.2s;
        }

        .bouncing-dots div:nth-child(3) {
            animation-delay: 0.4s;
        }

        /* Particle JS styles */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0; /* Ensure it's in the background */
        }
        .header-area .container {
            position: relative; /* Ensure content is on top of particles */
            z-index: 1;
        }

        /* Shine Effect */
        .shine {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, rgba(255,255,255,0) 20%, rgba(255,255,255,0.8) 50%, rgba(255,255,255,0) 80%);
            transform: skewX(-25deg);
            animation: shine 5s infinite;
        }
        @keyframes shine {
            0% { left: -100%; }
            20% { left: 150%; }
            100% { left: 150%; }
        }
    </style>
</head>

<body class="{{ request()->routeIs('home') ? 'home-page-body dynamic-home' : 'inner-page-body dynamic-inner' }}">
  <div class="preloader">
    <div class="bouncing-dots">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

  <!-- include Navbar -->
@if(Request::is('/'))
<nav class="navbar navbar-expand-lg main_menu home-header" id="main_menu_area">
    <div class="container">
      <a class="navbar-brand" href="/">
        <svg viewBox="0 0 250 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet">
          <style>
              .logo-text-embed {
                  font-family: 'Poppins', sans-serif;
                  font-size: 40px;
                  font-weight: 700;
              }
          </style>
          <text x="0" y="45" class="logo-text-embed">
              <tspan class="logo-part-n">N</tspan>
              <tspan class="logo-part-rest">asrullah</tspan>
          </text>
      </svg>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#homeNavbarNav"
        aria-controls="homeNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="far fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="homeNavbarNav">
        <div class="mainmenu-area">
            <ul class="navbar-nav ms-auto" id="primary-menu">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#home-page">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about-page">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#portfolio-page">Portfolio <i class="fas fa-angle-down"></i></a>
                <ul class="sub_menu">
                  <li><a href="/portfolio">All Portfolio</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#skills-page">Skills</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#blog-page">Blog <i class="fas fa-angle-down"></i></a>
                <ul class="sub_menu">
                  <li><a href="{{route('blog')}}">All Blog</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact-page">Contact</a>
              </li>
            </ul>
        </div>
      </div>
    </div>
  </nav>
@else
@include('frontend.layouts.inc.navbar')
@endif

<div class="main_wrapper" data-bs-spy="scroll" data-bs-target="#main_menu_area" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary" tabindex="0">

    @yield('content')

    <!-- Include Footer -->
    @include('frontend.layouts.inc.footer')
</div>

<!--====== SCRIPTS JS ======-->
@include('frontend.layouts.inc.script')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    // Preloader Fade Out
    window.addEventListener('load', () => {
        const preloader = document.querySelector('.preloader');
        preloader.classList.add('hidden');
    });

    // Initialize AOS (Animate on Scroll)
    AOS.init({
        duration: 1000, // values from 0 to 3000, with step 50ms
        once: true, // whether animation should happen only once - while scrolling down
    });

    // Initialize Particles.js only on the homepage
    if (document.body.classList.contains('home-page-body')) {
        particlesJS.load('{{ asset('frontend/particles.json') }}', function() {
            console.log('Particles.js config loaded');
        });
    }
</script>

    @stack('scripts')
    </body>

    </html>
