<x-home-layout>

    @php
    $generalSecretariatModel = \Illuminate\Support\Facades\Cache::remember('general_secretariat', 60*60*24, function () {
        return \App\Models\GeneralSecretariat::first();
    });
//    dd($generalSecretariatModel);
    @endphp
   <!-- Team area start -->
    <section class="portfolio__service service-v5 pt-140 pb-140">

        <div class="container">

            <div class="row">
                <!-- <div class="col-xxl-8 col-xl-5 col-lg-6 col-md-6">
                  <h2 class="sec-title animation__char_come"> General Secretariat</h2>
                </div> -->
                <div class="col-xxl-2 col-xl-7 col-lg-6 col-md-6">

                </div>
                <div class="col-xxl-4 col-xl-7 col-lg-6 col-md-6">
                    <div class="sec-title-wrapper">
                        <!-- <h2 class="sec-sub-title title-anim">Our Team</h2> -->
                        <br><br><br>
                        <h3 class="sec-title title-anim orange_color">{{__("frontend.secretariat")}}</h3>
                        <p class="mt-4 sec-description title-anim">{{__($generalSecretariatModel->description ?? 'hello world everyone')}}</p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-7 col-lg-6 col-md-6">
                    <div class="portfolio__service-item">
                        <h3 class="ps-title-position">{{__($generalSecretariatModel->position ?? null)}}<br><br></h3>
                        <img src="assets/imgs/apsf/gen-sec/gen-sec.webp" width="80%" alt="">
                        <h3 class="ps-title-name">{{__($generalSecretariatModel->name)}}<br><br></h3>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-7 col-lg-6 col-md-6">

                </div>
            </div>
        </div>
    </section>

    <!-- Team area end -->
</x-home-layout>
