<x-home-layout>
@php
$homepageModel = \Illuminate\Support\Facades\Cache::remember('homepage', 60*60*24, function () {
    return \App\Models\Homepage::first();
});

//dd($homepageModel);


    $heroTitle = $homepageModel->hero_title ?? null;
    $heroDescriptionOne = $homepageModel->hero_description_one ?? null;
    $heroDescriptionTwo = $homepageModel->hero_description_two ?? null;
    $missionTitle = $homepageModel->mission_title ?? null;
    $missionDescription = $homepageModel->mission_description ?? null;
    $visionTitle = $homepageModel->vision_title ?? null;
    $visionDescription = $homepageModel->vision_description ?? null;
    $valuesHeading = $homepageModel->values_heading ?? null;
    $valueTitleOne = $homepageModel->value_title_one ?? null;
    $valueDescriptionOne = $homepageModel->value_description_one ?? null;
    $valueTitleTwo = $homepageModel->value_title_two ?? null;
    $valueDescriptionTwo = $homepageModel->value_description_two ?? null;
    $valueTitleThree = $homepageModel->value_title_three ?? null;
    $valueDescriptionThree = $homepageModel->value_description_three ?? null;
    $valueTitleFour = $homepageModel->value_title_four ?? null;
    $valueDescriptionFour = $homepageModel->value_description_four ?? null;
    $valueTitleFive = $homepageModel->value_title_five ?? null;
    $valueDescriptionFive = $homepageModel->value_description_five ?? null;
    $valueTitleSix = $homepageModel->value_title_six ?? null;
    $valueDescriptionSix = $homepageModel->value_description_six ?? null;
    $chairmanMessageTitle = $homepageModel->chairman_message_title ?? null;
    $chairmanMessageOne = $homepageModel->chairman_message_one ?? null;
    $chairmanMessageTwo = $homepageModel->chairman_message_two ?? null;
    $chairmanMessageThree = $homepageModel->chairman_message_three ?? null;
    $partnersTitle = $homepageModel->partners_title ?? null;
    $partnersDescription = $homepageModel->partners_description ?? null;
    $chairmanImage = $homepageModel->media->first()->getUrl() ?? null;
//    dd($heroTitle);

@endphp
    <!-- Hero area start -->
    <section class="service__hero-2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="service__hero-inner-2">
                        <div class="service__hero-left-2">
                            <img src="assets/imgs/apsf/home-header/home-435x472.webp" alt="Image" class="image-1">
                            <img src="assets/imgs/apsf/home-header/home-240x240.webp" alt="Image" class="image-2">
                            <!-- <img src="assets/imgs/apsf/header-area/student.webp" alt="Image" class="image-3"> -->
                            <img src="assets/imgs/apsf/home-header/img.png" alt="Image" class="image-4">
                        </div>
                        <div class="service__hero-right-2 hero7__thum-anim">
{{--                            part of css animation: creative--}}
                            <h2 class="title ">{{ __($heroTitle) }} </h2>
{{--                            part of css animation: animate_content--}}
                            <p class="to_justify ">{{__($heroDescriptionOne)}} <br><br>{{__($heroDescriptionTwo)}}</p>
                            <img src="assets/imgs/home-7/scroll.png" alt="scroll Image" class="scroll">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="assets/imgs/home-7/shape-6.png" alt="Shape Image" class="shape-1">
    </section>
    <!-- Hero area end -->


    <!-- About area start -->
    <section class="about__area-7" style="background-color: #f8f1e6;">
        <div class="container pt-130 pb-110">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <div class="about__left-7">
                        <!-- <img src="assets/imgs/apsf/body-area/home-image-04.webp" alt="Image" data-speed="auto"> -->
                        <img src="assets/imgs/apsf/mission-vision/mission-vision.webp" alt="Image" data-speed="auto">
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-5 col-lg-5 col-md-5">
                    <div class="text-anim objectives-inner" style="background-color: #f8f1e6;">
                        <h2 class="sec-title title-anim orange_color">{{__($visionTitle)}}</h2>
                        <p class="body-text-common to_justify"><br>{{__($visionDescription)}}</p>
                        <h2 class="sec-title title-anim orange_color">{{__($missionTitle)}}</h2>
                        <p class="body-text-common to_justify"><br>{{__($missionDescription)}}</p>
                    </div>
                </div>
            </div>
        </div>

        <img src="assets/imgs/home-7/shape-4.png" alt="Shape" class="shape-1">
    </section>
    <!-- About area end -->


    <section class="values-area">
        <div class="container pt-140">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper text-anim">
                        <h2 class="sec-title title-anim orange_color">{{__($valuesHeading)}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service area start -->
    <section class="service__area-7 pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="service__items-7 animation_service_7">
                        <div class="service__item-7">
                            <img src="assets/imgs/apsf/values-icons/excellence.webp" alt="">
                            <h3 class="service__title-7">{{__($valueTitleOne)}}</h3>
                            <p> {{__($valueDescriptionOne)}}</p>
                        </div>
                        <div class="service__item-7">
                            <img src="assets/imgs/apsf/values-icons/collaboration.webp" alt="">
                            <h3 class="service__title-7">{{__($valueTitleTwo)}}</h3>
                            <p>{{__($valueDescriptionTwo)}}</p>
                        </div>
                        <div class="service__item-7">
                            <img src="assets/imgs/apsf/values-icons/innovation.webp" alt="">
                            <h3 class="service__title-7">{{__($valueTitleThree)}}</h3>
                            <p>{{__($valueDescriptionThree)}}</p>
                        </div>
                        <div class="service__item-7">
                            <img src="assets/imgs/apsf/values-icons/Integration.webp" alt="">
                            <h3 class="service__title-7">{{__($valueTitleFour)}}</h3>
                            <p>{{__($valueDescriptionFour)}}</p>
                        </div>
                        <div class="service__item-7">
                            <img src="assets/imgs/apsf/values-icons/Sustainability.webp" alt="">
                            <h3 class="service__title-7">{{__($valueTitleFive)}}</h3>
                            <p>{{__($valueDescriptionFive)}}</p>
                        </div>
{{--                        <div class="service__item-7">--}}
{{--                            <img src="assets/imgs/apsf/values-icons/communityengagement.webp" alt="">--}}
{{--                            <h3 class="service__title-7">{{__($valueTitleSix)}}</h3>--}}
{{--                            <p>{{__($valueDescriptionSix)}}</p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service area end -->

    <section class="values-area">
        <div class="container pt-140">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper text-anim">
                        <h2 class="sec-title title-anim orange_color">{{__($chairmanMessageTitle)}}</h2>
                        <!-- <p class="sec-text">Comprehensive solutions tailored to meet diverse needs with precision.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service area start -->

    <!-- Testimonial area start -->
    <section class="testimonial__area-2">
        <div class="container g-0 line pb-140">
            <span class="line-3"></span>

            <div class="row g-0 chairman-flex">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="testimonial__video">
                        <img src="{{$chairmanImage}}" alt="Brand Logo" class="chairman-image">
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                    <div class="testimonial__slider-wrapper-2">
                        <div class="swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide testimonial__slide">
                                    <div class="testimonial__inner-2" style="background-color: #f8f1e6;">
                                        <p class="testimonial__text-2 to_justify" >{{__($chairmanMessageOne)}} <br><br>{{__($chairmanMessageTwo)}}<br><br>
                                            {{__($chairmanMessageThree)}} </p>
                                        <blockquote>{{__("frontend.chairman.name")}}<br>
                                            <cite>{{__("frontend.chairman.title")}}</cite></blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial area end -->









</x-home-layout>




<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        console.log('DOM fully loaded and parsed');
    })
</script>
