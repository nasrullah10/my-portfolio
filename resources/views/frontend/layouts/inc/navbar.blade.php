<nav class="navbar navbar-expand-lg main_menu inner-header" id="main_menu_area">
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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="far fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="mainmenu-area">
        <ul class="navbar-nav ms-auto" id="primary-menu">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('portfolio')}}">Portfolio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('blog')}}">Blog</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
