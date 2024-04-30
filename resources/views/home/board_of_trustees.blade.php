<x-home-layout>
    @php
    $boardOfTrusteesModel = \Illuminate\Support\Facades\Cache::remember('board_of_trustees', 60*60*24, function () {
        return \App\Models\BoardOfTrustee::get();
    });
//    dd($boardOfTrusteesModel);
    $names = [];
    foreach ($boardOfTrusteesModel as $boardOfTrustee) {
        $names[] = $boardOfTrustee->name;
//        dd($names);
    }
    $firstTrustee = $names[0] ?? null;
    $secondTrustee = $names[1] ?? null;
    $thirdTrustee = $names[2] ?? null;
    $fourthTrustee = $names[3] ?? null;
    $fifthTrustee = $names[4] ?? null;
    $sixthTrustee = $names[5] ?? null;
    @endphp
   <!-- Team area start -->
    <section class="portfolio__service service-v5 pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                    <h2 class="sec-title animation__char_come orange_color"> {{__("frontend.board.heading")}}</h2>
                </div>
            </div>
            <div class="portfolio__service-list">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                        <div class="portfolio__service-item">
                            <h3 class="ps-title">{{__($firstTrustee)}}</h3>
                            <img src="assets/imgs/apsf/board-of-trustees/bot_05.webp" width="80%" alt="">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                        <div class="portfolio__service-item">
                            <h3 class="ps-title">{{__($secondTrustee)}}</h3>
                            <img src="assets/imgs/apsf/board-of-trustees/bot_04.webp" width="80%" alt="">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                        <div class="portfolio__service-item">
                            <h3 class="ps-title">{{__($thirdTrustee)}}<br><br></h3>
                            <img src="assets/imgs/apsf/board-of-trustees/bot_03.webp" width="80%" alt="">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 ">
                        <div class="portfolio__service-item">
                            <h3 class="ps-title">{{__($fourthTrustee)}}<br><br></h3>
                            <img src="assets/imgs/apsf/board-of-trustees/08.webp" width="80%" alt="">
{{--                            <img src="assets/imgs/apsf/board-of-trustees/bot_02.webp" width="80%" alt="">--}}
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                        <div class="portfolio__service-item">
                            <h3 class="ps-title">{{__($fifthTrustee)}}</h3>
                            <img src="assets/imgs/apsf/board-of-trustees/bot_02.webp" width="80%" alt="">
{{--                            <img src="assets/imgs/apsf/board-of-trustees/bot_01.webp" width="80%" alt="">--}}
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                        <div class="portfolio__service-item">
                            <h3 class="ps-title">{{__($sixthTrustee)}}</h3>
                            <img src="assets/imgs/apsf/board-of-trustees/bot_01.webp" width="80%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team area end -->
</x-home-layout>
