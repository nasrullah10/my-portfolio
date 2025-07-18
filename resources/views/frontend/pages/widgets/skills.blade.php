<section class="skills-area section-padding-top" id="skills-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title" data-aos="zoom-in-up">
                            <span class="subtitle">{{ __('My Skills') }}</span>
                            <h2 class="title">{{ __('What I Know') }}</h2>
                            <div class="desc">
                                <p>{{$skill->sub_title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row skills">
                    @foreach ($skillItems as $item)
                    <div class="col-sm-6">
                        <div class="bar_group" data-aos="zoom-in" data-aos-delay="{{$loop->index * 100}}">
                            <div class="title">{{$item->name}}</div>
                           
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <figure class="single-image text-right" data-aos="zoom-in-left" data-aos-delay="300">
                    <img src="{{asset($skill->image)}}" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>
