<section class="about-area section-padding-top">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6" data-aos="zoom-in-right">
                <figure class="about-image">
                    <img src="{{asset($about->image)}}" alt="">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="about-text">
                    <h3 class="title" data-aos="zoom-in-left">{{$about->title}}</h3>
                    <div class="desc" data-aos="zoom-in-left" data-aos-delay="200">
                        {!! $about->description !!}
                    </div>
                    <a href="{{route('admin.resume.download')}}" class="button-primary mouse-dir" data-aos="zoom-in-left" data-aos-delay="400">
                        <span class="icon"><i class="fal fa-download"></i></span>
                        <span class="text">Download Resume</span>
                        <span class="dir-part"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
