<!-- Header-Area-Start -->
<header class="header-area parallax-bg" id="home-page" style="background: @if($hero && $hero->image) url('{{ asset($hero->image) }}') @else #000 @endif no-repeat scroll top center/cover;">
    <div id="particles-js"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-text">
                    <h3 class="typer-title shine" data-aos="fade-up">I'm ui/ux designer</h3>
                    <div class="desc" data-aos="fade-up" data-aos-delay="200">
                        <p>{{ $hero->sub_title }}</p>
                    </div>
                    @if($hero->btn_text)
                    <a href="{{ $hero->btn_url }}" target="_blank" class="button-dark mouse-dir" data-aos="fade-up" data-aos-delay="400">
                        {{ $hero->btn_text }}<span class="dir-part"></span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header-Area-End -->
    </div>
  </div>
</header>
@push('scripts')
<script>
  @php
            $titles = [];
            foreach($typerTitles as $title){
                $titles[] = $title->title;
            }
            $titles = json_encode($titles);
        @endphp
        $('.header-area .typer-title').typer({!! $titles !!});
</script>
@endpush
<!-- Header-Area-End -->