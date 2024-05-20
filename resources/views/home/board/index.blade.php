<x-home-layout>

   <!-- Team area start -->
    <section class="portfolio__service service-v5 pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                    <h2 class="sec-title orange_color"> {{__("frontend.board.heading")}}</h2>
                </div>
            </div>
            <div class="portfolio__service-list">
                <div class="row">
                    @foreach($boardOfTrusteesModel as $boardOfTrustees)


                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 hello-trouble">
                                <div class="portfolio__service-item ">
                                    <a href="{{route('board-of-trustee.show',$boardOfTrustees)}}">
                                    @if($boardOfTrustees->media->isNotEmpty())
                                    <img src="{{$boardOfTrustees->media->first()->getUrl()}}" width="80%" alt="">
                                    @endif
                                    <h3 class="ps-title mt-4">{{__($boardOfTrustees->name)}}</h3>
                                    </a>
                                </div>
                            </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Team area end -->
</x-home-layout>
