<section class="experience-area section-padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 d-none d-lg-block" data-aos="zoom-in-right">
                <figure class="single-image">
                    <img src="{{asset($experience->image)}}" alt="">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="experience-text">
                    <h3 class="title" data-aos="zoom-in-left">{{$experience->title}}</h3>
                    <div class="desc" data-aos="zoom-in-left" data-aos-delay="200">
                        {!!$experience->description!!}
                    </div>
                    <div class="row">
                        <div class="col-sm-6" data-aos="zoom-in-left" data-aos-delay="400">
                            <div class="icon-info">
                                <div class="icon"><i class="fas fa-mobile-android-alt"></i></div>
                                <h6><a href="javascript:void(0)" class="text">{{$experience->phone}}</a></h6>
                            </div>
                        </div>
                        <div class="col-sm-6" data-aos="zoom-in-left" data-aos-delay="500">
                            <div class="icon-info">
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <h6><a href="javascript:void(0)" class="text">{{$experience->email}}</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
