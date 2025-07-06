@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerHelpLinks = \App\Models\FooterHelpLink::all();
@endphp

<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <svg viewBox="0 0 250 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet">
          <style>
              .logo-text-embed {
                  font-family: 'Poppins', sans-serif;
                  font-size: 40px;
                  font-weight: 700;
              }
          </style>
          <text x="0" y="45" class="logo-text-embed">
              <tspan fill="#ff885e">N</tspan>
              <tspan fill="#FFFFFF">asrullah</tspan>
          </text>
      </svg>
                    </figure>
                    <p>{{$footerInfo->info}}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($footerIcons as $icon)
                            <li><a href="{{$icon->url}}"><i class="{{$icon->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">
                    @foreach ($footerUsefulLinks as $usefulLink)
                        <li><a href="{{$usefulLink->url}}">{{$usefulLink->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{{$footerContact->address}}</li>
                    <li><a href="#">{{$footerContact->phone}}</a></li>
                    <li><a href="#">{{$footerContact->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach ($footerHelpLinks as $footerHelpLink)
                    <li><a href="{{$footerHelpLink->url}}">{{$footerHelpLink->name}}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>{{$footerInfo->copy_right}}</p>
                        <p>{{$footerInfo->powered_by}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
