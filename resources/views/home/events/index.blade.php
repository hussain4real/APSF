<x-home-layout>
    <!-- Blog area start -->
    <section class="blog__area-7 blog__animation">
        <div class="container g-0 pt-140 pb-100">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="sec-title-wrapper">
                        <h3 class="sec-title title-anim orange_color">{{__("frontend.events.heading")}}</h3>
                    </div>
                </div>
                @forelse($events as $event)
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 blog-grid">
                    <article class="blog__item">
                        <div class="blog__img-wrapper">
                            <a href="{{route('event.show', $event)}}">
                                <div class="img-box">
                                    @forelse($event->firstTwoImages as $image)
                                    <img class="image-box__item" src="{{$image->getUrl()}}" alt="">
{{--                                    <img class="image-box__item" src="{{$media->getUrl()[1]}}" alt="">--}}
                                    @empty
                                    <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-1.webp" alt="">
                                    <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-1.webp" alt="">
                                    @endforelse
                                </div>
                            </a>
                        </div>
                        <h4 class="blog__meta"><a href="{{route('event.show', $event)}}">{{$event->type}}</a> . {{$event->event_start_date->diffForHumans()}}</h4>
                        <h5><a href="{{route('event.show', $event)}}" class="blog__title">{{$event->event_title}}</a></h5>
                        <p class="blog__desc">{{$event->event_excerpt}}</p>
                        <a href="{{route('event.show', $event)}}" class="blog__btn rounded ">Read More <span><i
                                    class="fa-solid fa-arrow-right"></i></span></a>
                    </article>
                </div>
                @empty
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                    <article class="blog__item">
                        <div class="blog__img-wrapper">
                            <a href="#">
                                <div class="img-box">
                                    <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-1.webp" alt="">
                                    <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-1.webp" alt="">
                                </div>
                            </a>
                        </div>
                        <h4 class="blog__meta text-center">No Events</h4>
                    </article>
                </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- Blog area end -->
</x-home-layout>
<style>
    .blog-grid{
        width: 30rem; /*added by Aminu*/
        margin: 0 2rem;
    }

    .image-box img{
        width: 100%;
        object-fit: contain;
    }
</style>
