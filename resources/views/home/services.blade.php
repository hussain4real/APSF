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
    <style>
        .trial-hero-wrapper{
            /*make it a container with margin on left and right*/

            margin: 0 auto;
            padding: 0 ;

        }
        /*first hero style start
        1500x600_banner copy
        */
        .hero {
            position: relative;
            background: url('assets/imgs/apsf/services/services-body/1500x600_banner copy.webp') center/cover no-repeat;
            /*background: url('https://images.pexels.com/photos/2570062/pexels-photo-2570062.jpeg') center/cover no-repeat;*/
            height: 100vh;
            margin:1rem 0 4rem 0;
            padding-right: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom-left-radius: 4rem;
            border-bottom-right-radius: 4rem;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Black color with 60% opacity */
            z-index: 1; /* Ensure the overlay is behind the content */
        }

        .hero-content {

            text-align: center;
            color: #fff;
            z-index: 2; /* Ensure the content is on top of the overlay */
        }

        .hero-title {
            font-size: 5em;
            color: #e56131;
            margin: 2rem 0;
            animation: fadeInUp 1s ease-in-out;
        }

        .hero-subtitle {
            font-size: 2em;
            color: rgb(150, 149, 149);
            margin: 3rem 0 4rem 0;
            animation: fadeInUp 1s ease-in-out 0.5s;
        }

        .hero-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2em;
            text-decoration: none;
            color: #fff;
            background-color: #e56131;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease-in-out;
        }

        .hero-button:hover {
            background-color: #d22912;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /*first hero style end*/

        /*second hero style start*/
        @import "https://unpkg.com/open-props";
        @import "https://unpkg.com/open-props/normalize.min.css";


        .hero1-container {
            display: grid;
            align-items: center;
            margin:1rem 2rem;
            gap: 4rem;

            grid-template-columns: 1fr 1fr;
            background: var(--grape-0);
        }

        .hero1 {
            padding: 0;
            display: grid;
            gap: var(--size-5);
        }

        .hero-message1 {
            display: grid;
            grid-template-columns: max-content;
            color: #e56131;
            line-height: 1.2;
            font-size: 6rem;
            margin-bottom: 2rem;
        }

        .hero-message1 > div:last-child {
            color: var(--indigo-7);
        }

        .under-hero1 {
            color: var(--gray-8);
            font-size: 1.5rem;
            line-height: 3rem;
            margin-block-end: var(--size-3);
        }

        .promo-art1 {
            align-self: stretch;

        }

        .promo-art1 > img {
            block-size: 100%;
            object-fit: cover;
        }

        .promo-art2 {
            align-self: stretch;
        }

        .promo-art2 > img {
            width: max-content;
            height: 600px;
            object-fit: cover;
            border-radius: 2rem;
        }
        /*second hero style end*/

    </style>
    <!-- Hero area start -->
    <div class="trial-hero-wrapper">
        <!-- first Hero area start -->
        <div class="hero">
            <div class="hero-content">
                <h1 class="hero-title">{{__("frontend.service.heading")}}</h1>
                <p class="hero-subtitle">{{__("frontend.service.description")}}</p>
                <a href="#" class="hero-button">{{__('frontend.hero.action')}}</a>
            </div>
        </div>
        <!-- first Hero area end -->

    </div>
    <section class="solution__area">
        <!-- second Hero area start -->
{{--        <div class="hero1-container">--}}
{{--            <section class="hero1">--}}
{{--                <h1 class="hero-message1">--}}
{{--                    <div>{{__("frontend.service.heading")}}</div>--}}

{{--                </h1>--}}
{{--                <p class="under-hero1">{{__("frontend.service.description")}}</p>--}}

{{--            </section>--}}
{{--            <picture class="promo-art1">--}}
{{--                <img src="https://doodleipsum.com/700/outline?i=513477ea4837ed87ff2fc8e64ae66968" height="900"  alt="a random doodle">--}}
{{--            </picture>--}}
{{--        </div>--}}
        <!-- second Hero area end -->
{{--        <hr>--}}
        <!-- third Hero area start -->
{{--        <div class="hero1-container">--}}
{{--            <section class="hero1">--}}
{{--                <h1 class="hero-message1">--}}
{{--                    <div>{{__("frontend.service.heading")}}</div>--}}

{{--                </h1>--}}
{{--                <p class="under-hero1">{{__("frontend.service.description")}}</p>--}}

{{--            </section>--}}
{{--            <picture class="promo-art2">--}}
{{--                400x600_services--}}
{{--                1500x600_banner copy--}}
{{--                <img src="{{asset('assets/imgs/apsf/services/services-body/400x600_services.webp')}}" alt="a random doodle">--}}
{{--            </picture>--}}
{{--        </div>--}}
        <!-- third Hero area end -->
{{--        <hr>--}}
{{--        <div class="container hero-line"></div>--}}

{{--        <div class="solution__wrapper">--}}

{{--            <div class="solution__left">--}}
{{--                <div class="solution__img-1">--}}
{{--                    <img src="assets/imgs/apsf/services/services-offered/services_435x472.jpg" alt="Solution Image">--}}
{{--                </div>--}}
{{--                <div class="solution__img-2">--}}
{{--                    <img src="assets/imgs/apsf/services/services-offered/services_220x334.jpg" alt="Solution Image">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="solution__mid">--}}
{{--                <h1 class="solution__title orange_color">{{__("frontend.service.heading")}}</h1>--}}
{{--                <p class="to_justify">{{__("frontend.service.description")}}</p>--}}
{{--            </div>--}}

{{--            <div class="solution__right">--}}
{{--                <div class="solution__img-3">--}}
{{--                    <img src="assets/imgs/apsf/services/services-offered/img.png" alt="Solution Image">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="container pb-130">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xxl-12">--}}
{{--                    <div class="solution__btm">--}}
{{--                        <ul>--}}
{{--                            <li>{{__("frontend.service.tagOne")}}</li>--}}
{{--                            <li>{{__("frontend.service.tagTwo")}}</li>--}}
{{--                            <li>{{__("frontend.service.tagThree")}}</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="solution__shape">--}}
{{--            <img src="assets/imgs/apsf/icon/1.png" alt="Shape Image" class="shape-1">--}}
{{--            <img src="assets/imgs/apsf/icon/2.png" alt="Shape Image" class="shape-2">--}}
{{--            <img src="assets/imgs/apsf/icon/3.png" alt="Shape Image" class="shape-3">--}}
{{--            <img src="assets/imgs/apsf/icon/4.png" alt="Shape Image" class="shape-4">--}}
{{--            <img src="assets/imgs/apsf/icon/5.png" alt="Shape Image" class="shape-5">--}}
{{--        </div>--}}
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
                                            <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>{{__("frontend.hero.action")}} <i class="fa-solid fa-arrow-right"></i></a>
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
                                            <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>{{__("frontend.hero.action")}} <i class="fa-solid fa-arrow-right"></i></a>
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
                                            <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>{{__("frontend.hero.action")}} <i class="fa-solid fa-arrow-right"></i></a>
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
                                            <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>{{__("frontend.hero.action")}} <i class="fa-solid fa-arrow-right"></i></a>
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
                                            <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>{{__("frontend.hero.action")}} <i class="fa-solid fa-arrow-right"></i></a>
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
{{--                                        <ul>--}}
{{--                                            <li>{{__($sixthServiceTagOne)}}</li>--}}
{{--                                            <li>{{__($sixthServiceTagTwo)}}</li>--}}
{{--                                            <li>{{__($sixthServiceTagThree)}}</li>--}}
{{--                                        </ul>--}}
                                        <div class="btn_wrapper">
                                            <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-secondary btn-item btn-hover orange_color2"><span></span>{{__("frontend.hero.action")}} <i class="fa-solid fa-arrow-right"></i></a>
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
        <div class="container g-0 line_4 ">
{{--            <div class="line-col-4">--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--            </div>--}}

            <div class="cta__inner-4">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="cta__content-4">
                            <img src="assets/imgs/thumb/4/1.webp" alt="Cta Image">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="cta__content-4">
                            <h2 class="cta__title-4 title-anim">{{__("frontend.scholarship.heading")}} </h2>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <div class="cta__content-4 text-anim">
                            <p>{{__("frontend.scholarship.description")}} </p>
                            <a class="btn-started" href="{{route('filament.admin.resources.resources.scholarships.index')}}">{{__("frontend.scholarship.action")}}<span><i
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
