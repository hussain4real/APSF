<x-home-layout>
    @php
    $foundersCommitteeModel = \Illuminate\Support\Facades\Cache::remember('founders_committee', 60*60*24, function () {
        return \App\Models\FoundersCommittee::get();
    });
//    dd($foundersCommitteeModel);
    @endphp

    <!-- Team area start -->
    <section class="portfolio__service service-v5 pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                    <h2 class="sec-title orange_color"> {{__("frontend.founder.heading")}}</h2>
                </div>
            </div>
            <div class="portfolio__service-list">

                <div class="row">
                    @foreach($foundersCommitteeModel as $foundersCommittee)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="portfolio__service-item">
                            <a href="{{$foundersCommittee->url}}" target="_blank">
                                <h3 class="ps-title orange_color"> {{__($foundersCommittee->name)}}</h3>
                                @if($foundersCommittee->media->isNotEmpty())
                                <img src="{{$foundersCommittee->media->first()->getUrl()}}" alt="">
{{--                                <img src="{{$foundersCommittee->getUrl()}}" alt="">--}}
                                @endif
                                <p class="ps-title-name orange_color mt-4" >{{__($foundersCommittee->country)}}</p>
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
