<x-home-layout>

    @php
    $servicesModel = \Illuminate\Support\Facades\Cache::remember('services', 60 * 60 * 24, function () {
        return \App\Models\Service::get();
    });
    $serviceSideTitle = [];
    $serviceTitle = [];
    $serviceDescription = [];
    $serviceTagOne = [];
    $serviceTagTwo = [];
    $serviceTagThree = [];
    $serviceTagFour = [];
    $serviceTagFive = [];

    foreach ($servicesModel as $service) {
        $serviceSideTitle[] = $service->service_side_title;
        $serviceTitle[] = $service->service_title;
        $serviceDescription[] = $service->service_description;
        $serviceTagOne[] = $service->service_tag_one;
        $serviceTagTwo[] = $service->service_tag_two;
        $serviceTagThree[] = $service->service_tag_three;
        $serviceTagFour[] = $service->service_tag_four;
        $serviceTagFive[] = $service->service_tag_five;
//        dd($serviceSideTitle);
    }
    $firstServiceSideTitle = $serviceSideTitle[0];
    $firstServiceTitle = $serviceTitle[0];
    $firstServiceDescription = $serviceDescription[0];
    $firstServiceTagOne = $serviceTagOne[0];
    $firstServiceTagTwo = $serviceTagTwo[0];
    $firstServiceTagThree = $serviceTagThree[0];
    $firstServiceTagFour = $serviceTagFour[0];
    $firstServiceTagFive = $serviceTagFive[0];

    $secondServiceSideTitle = $serviceSideTitle[1];
    $secondServiceTitle = $serviceTitle[1];
    $secondServiceDescription = $serviceDescription[1];
    $secondServiceTagOne = $serviceTagOne[1];
    $secondServiceTagTwo = $serviceTagTwo[1];
    $secondServiceTagThree = $serviceTagThree[1];
    $secondServiceTagFour = $serviceTagFour[1];
    $secondServiceTagFive = $serviceTagFive[1];

    $thirdServiceSideTitle = $serviceSideTitle[2];
    $thirdServiceTitle = $serviceTitle[2];
    $thirdServiceDescription = $serviceDescription[2];
    $thirdServiceTagOne = $serviceTagOne[2];
    $thirdServiceTagTwo = $serviceTagTwo[2];
    $thirdServiceTagThree = $serviceTagThree[2];
    $thirdServiceTagFour = $serviceTagFour[2];
    $thirdServiceTagFive = $serviceTagFive[2];

    $fourthServiceSideTitle = $serviceSideTitle[3] ?? null;
    $fourthServiceTitle = $serviceTitle[3] ?? null;
    $fourthServiceDescription = $serviceDescription[3] ?? null;
    $fourthServiceTagOne = $serviceTagOne[3] ?? null;
    $fourthServiceTagTwo = $serviceTagTwo[3] ?? null;
    $fourthServiceTagThree = $serviceTagThree[3] ?? null;
    $fourthServiceTagFour = $serviceTagFour[3] ?? null;
    $fourthServiceTagFive = $serviceTagFive[3] ?? null;

    $fifthServiceSideTitle = $serviceSideTitle[4] ?? null;
    $fifthServiceTitle = $serviceTitle[4] ?? null;
    $fifthServiceDescription = $serviceDescription[4] ?? null;
    $fifthServiceTagOne = $serviceTagOne[4] ?? null;
    $fifthServiceTagTwo = $serviceTagTwo[4] ?? null;
    $fifthServiceTagThree = $serviceTagThree[4] ?? null;
    $fifthServiceTagFour = $serviceTagFour[4] ?? null;
    $fifthServiceTagFive = $serviceTagFive[4] ?? null;

    $sixthServiceSideTitle = $serviceSideTitle[5] ?? null;
    $sixthServiceTitle = $serviceTitle[5] ?? null;
    $sixthServiceDescription = $serviceDescription[5] ?? null;
    $sixthServiceTagOne = $serviceTagOne[5] ?? null;
    $sixthServiceTagTwo = $serviceTagTwo[5] ?? null;
    $sixthServiceTagThree = $serviceTagThree[5] ?? null;
    $sixthServiceTagFour = $serviceTagFour[5] ?? null;
    $sixthServiceTagFive = $serviceTagFive[5] ?? null;
//    dd($firstServiceSideTitle);
    @endphp
    <!-- Hero area start -->
    <section class="solution__area">
        <div class="container hero-line"></div>
        <div class="solution__wrapper">
            <div class="solution__left">
                <div class="solution__img-1">
                    <img src="assets/imgs/apsf/services/services-offered/services_435x472.jpg" alt="Solution Image">
                </div>
                <div class="solution__img-2">
                    <img src="assets/imgs/apsf/services/services-offered/services_220x334.jpg" alt="Solution Image">
                </div>
            </div>

            <div class="solution__mid">
                <h1 class="solution__title animation__char_come orange_color">Services We Offer</h1>
                <p class="to_justify">We provide tailored services to meet diverse educational needs, from academic support to cutting-edge programs. Dedicated to empowering members, we enhance teaching, support student achievement and advocate for community interests, fostering excellence and growth in education.</p>
            </div>

            <div class="solution__right">
                <div class="solution__img-3">
                    <img src="assets/imgs/apsf/services/services-offered/services_459x414.jpg" alt="Solution Image">
                </div>
            </div>
        </div>

        <div class="container pb-130">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="solution__btm">
                        <ul>
                            <li>Approach</li>
                            <li>Creativity</li>
                            <li>Experienced</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="solution__shape">
            <img src="assets/imgs/apsf/icon/1.png" alt="Shape Image" class="shape-1">
            <img src="assets/imgs/apsf/icon/2.png" alt="Shape Image" class="shape-2">
            <img src="assets/imgs/apsf/icon/3.png" alt="Shape Image" class="shape-3">
            <img src="assets/imgs/apsf/icon/4.png" alt="Shape Image" class="shape-4">
            <img src="assets/imgs/apsf/icon/5.png" alt="Shape Image" class="shape-5">
        </div>
    </section>
    <!-- Hero area end -->


    <!-- Service area start -->
    <section class="service__area-6">
        <div class="container">
            <div class="row inherit-row">
                <div class="col-xxl-12">
                    <div class="content-wrapper">
                        <div class="left-content">
                            <ul class="service__list-6">
                                <li class="active"><a href="#service_1">{!! __($firstServiceSideTitle) !!}</a></li>
                                <li><a href="#service_2">{!! __($secondServiceSideTitle) !!}</a></li>
                                <li><a href="#service_3">{!! __($thirdServiceSideTitle) !!}</a></li>
                                <li><a href="#service_4">{!! __($fourthServiceSideTitle) !!}</a></li>
                                <li><a href="#service_5">{!! __($fifthServiceSideTitle) !!}</a></li>
                                <li><a href="#service_6">{!! $sixthServiceSideTitle !!}</a></li>
                            </ul>
                        </div>

                        <div class="mid-content">
                            <div class="service__image">
                                <img src="assets/imgs/apsf/services/services-offered/academic_support.webp" alt="Service Image">
                            </div>
                            <div class="service__image">
                                <img src="assets/imgs/apsf/services/services-offered/professional_development.webp" alt="Service Image">
                            </div>
                            <div class="service__image">
                                <img src="assets/imgs/apsf/services/services-offered/student_support.webp" alt="Service Image">
                            </div>
                            <div class="service__image">
                                <img src="assets/imgs/apsf/services/services-offered/advocacy_representation.webp" alt="Service Image">
                            </div>
                            <div class="service__image">
                                <img src="assets/imgs/apsf/services/services-offered/programs_initiatives.webp" alt="Service Image">
                            </div>
                            <div class="service__image">
                                <img src="assets/imgs/apsf/services/services-offered/memberships.webp" alt="Service Image">
                            </div>
                        </div>

                        <div class="right-content">
                            <div class="service__items-6">

                                <div class="service__item-6 has__service_animation" id="service_1" data-secid="1">
                                    <div class="image-tab">
                                        <img src="assets/imgs/apsf/services/services-offered/academic_support.webp" alt="Service Image">
                                    </div>

                                    <div class="animation__service_page">
                                        <h2 class="service__title-6 orange_color">{{__($firstServiceTitle)}}</h2>
                                        <p class="services-p">{{__($firstServiceDescription)}}</p>
                                        <ul>
                                            <li>{{__($firstServiceTagOne)}}</li>
                                            <li>{{__($firstServiceTagTwo)}}</li>
                                            <li>{{__($firstServiceTagThree)}}</li>
                                        </ul>
                                        <div class="btn_wrapper">
                                            <a href="#" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>Be A Member <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="service__item-6" id="service_2" data-secid="2">
                                    <div class="image-tab">
                                        <img src="assets/imgs/apsf/services/services-offered/professional_development.webp" alt="Service Image">
                                    </div>

                                    <div class="animation__service_page">
                                        <h2 class="service__title-6 orange_color">{{__($secondServiceTitle)}}</h2>
                                        <p class="services-p">{{__($secondServiceDescription)}}</p>
                                        <ul>
                                            <li>{{__($secondServiceTagOne)}}</li>
                                            <li>{{__($secondServiceTagTwo)}}</li>
                                            <li>{{__($secondServiceTagThree)}}</li>
                                            <li>{{__($secondServiceTagFour)}}</li>
                                        </ul>
                                        <div class="btn_wrapper">
                                            <a href="#" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>Be A Member <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="service__item-6" id="service_3" data-secid="3">

                                    <div class="image-tab">
                                        <img src="assets/imgs/apsf/services/services-offered/student_support.webp" alt="Service Image">
                                    </div>

                                    <div class="animation__service_page">
                                        <h2 class="service__title-6 orange_color">{{__($thirdServiceTitle)}}</h2>
                                        <p class="services-p">{{__($thirdServiceDescription)}}</p>
                                        <ul>
                                            <li>{{__($thirdServiceTagOne)}}</li>
                                            <li>{{__($thirdServiceTagTwo)}}</li>
                                            <li>{{__($thirdServiceTagThree)}}</li>
                                            <li>{{__($thirdServiceTagFour)}}</li>
                                            <li>{{__($thirdServiceTagFive)}}</li>
                                        </ul>
                                        <div class="btn_wrapper">
                                            <a href="#" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>Be A Member <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="service__item-6" id="service_4" data-secid="4">
                                    <div class="image-tab">
                                        <img src="assets/imgs/apsf/services/services-offered/advocacy_representation.webp" alt="Service Image">
                                    </div>

                                    <div class="animation__service_page">
                                        <h2 class="service__title-6 orange_color">{{__($fourthServiceTitle)}}</h2>
                                        <p class="services-p">{{__($fourthServiceDescription)}}</p>
                                        <ul>
                                            <li>{{__($fourthServiceTagOne)}}</li>
                                            <li>{{__($fourthServiceTagTwo)}}</li>
                                            <li>{{__($fourthServiceTagThree)}}</li>
                                        </ul>
                                        <div class="btn_wrapper">
                                            <a href="#" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>Be A Member <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="service__item-6" id="service_5" data-secid="5">
                                    <div class="image-tab">
                                        <img src="assets/imgs/apsf/services/services-offered/programs_initiatives.webp" alt="Service Image">
                                    </div>

                                    <div class="animation__service_page">
                                        <h2 class="service__title-6 orange_color">{{__($fifthServiceTitle)}}</h2>
                                        <p class="services-p">{{__($fifthServiceDescription)}}</p>
                                        <ul>
                                            <li>{{__($fifthServiceTagOne)}}</li>
                                            <li>{{__($fifthServiceTagTwo)}}</li>
                                        </ul>
                                        <div class="btn_wrapper">
                                            <a href="#" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>Be A Member <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="service__item-6" id="service_6" data-secid="6">
                                    <div class="image-tab">
                                        <img src="assets/imgs/apsf/services/services-offered/memberships.webp" alt="Service Image">
                                    </div>

                                    <div class="animation__service_page">
                                        <h2 class="service__title-6 orange_color">{{__($sixthServiceTitle)}}</h2>
                                        <p class="services-p">{{__($sixthServiceDescription)}}</p>
                                        <ul>
                                            <li>{{__($sixthServiceTagOne)}}</li>
                                            <li>{{__($sixthServiceTagTwo)}}</li>
                                            <li>{{__($sixthServiceTagThree)}}</li>
                                        </ul>
                                        <div class="btn_wrapper">
                                            <a href="#" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>Be A Member  <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service area end -->

    <!-- Scholarship CTA area start -->
    <div class="cta__area-4">
        <div class="container g-0 line_4 pb-150">
            <div class="line-col-4">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="cta__inner-4">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="cta__content-4">
                            <img src="assets/imgs/thumb/4/1.webp" alt="Cta Image">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="cta__content-4">
                            <h2 class="cta__title-4 title-anim">Apply for Scholarships</h2>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="cta__content-4 text-anim">
                            <p>The role of this portal extends to acting as a catalyst for students' future success and will also function as a scholarship resource based on specific criteria to ensure continued student growth beyond graduation through postgraduate programs.</p>
                            <a class="btn-started" href="#">Apply Now <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>

                <img src="assets/imgs/shape/21.png" alt="shape Image" class="cta-shape">
                <img src="assets/imgs/shape/22.png" alt="shape Image" class="cta-shape-2">
            </div>
        </div>
    </div>
    <!-- Scholarship CTA area end -->

</x-home-layout>
