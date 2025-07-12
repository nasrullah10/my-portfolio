<section class="portfolio-area section-padding-top" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title" data-aos="zoom-in-up">
                    <h3 class="title">{{$portfolioTitle->title}}</h3>
                    <div class="desc">
                        {!! $portfolioTitle->sub_title !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter-menu" data-aos="zoom-in-up" data-aos-delay="200">
                    <li class="active" data-filter="*">All Projects</li>
                    @foreach ($portfolioCategories as $category)
                    <li data-filter=".{{$category->slug}}">{{$category->name}}</li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="portfolio-wrapper">
            <div class="row portfolios">
                @foreach ($portfolioItems as $item)

                <div class="col-md-6 col-lg-4 filter-item {{$item->category->slug}}" data-aos="zoom-in" data-aos-delay="{{$loop->index * 100}}">
                    <div class="single-portfolio" data-aos="zoom-in-up" data-aos-delay="{{$loop->index * 100}}">
                        <figure class="portfolio-image">
                            <img src="{{asset($item->image)}}" alt="">
                        </figure>
                        <div class="portfolio-content">
                            <a href="{{asset($item->image)}}" data-lity class="icon"><i
                                    class="fas fa-plus"></i></a>
                            <h4 class="title"><a href="{{route('show.portfolio', $item->id)}}">{{$item->title}}</a></h4>
                            <div class="desc">
                                <p>{!! Str::limit(strip_tags($item->description), 100)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
