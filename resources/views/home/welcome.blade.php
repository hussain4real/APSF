<x-home-layout>
    @php
    $homepageModel = \Illuminate\Support\Facades\Cache::remember('homepage', 60*60*24, function () {
    return \App\Models\Homepage::first();
    });




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
    // dd($heroTitle);
    $video = $homepageModel->media->filter(function($media){
    return $media->mime_type == 'video/mp4';
    })->first();

    @endphp

    <style>
        #home-video {
            display: flex;
            position: relative;
            max-width: 100%;
            max-height: 100%;
            justify-content: center;
            align-items: center;
            /*margin-bottom: 2rem;*/
        }

        #home-video video {
            width: 100%;
            height: 94vh;
            object-fit: cover;
            padding-bottom: 2rem;


        }

        #customControls {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.1);
            padding: 1rem;
            z-index: 100;
        }

        #muteButton {
            background-color: #e56131;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            opacity: 0;
            /* Hide the button initially */
            transition: opacity 0.5s;
            /* Smooth transition */
        }

        #home-video:hover #muteButton {
            opacity: 1;
            /* Show the button on hover */
        }

        .section-hero {
            display: flex;
            flex-wrap: wrap;
            background-color: #fdf2e9;
            padding: 4rem 0;
        }

        .hero {
            /* We'll not use px to define the length and will use rem. */
            /* max-width: 1300px; */
            max-width: 130rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 0 3.2rem;
            margin: 0 auto;
            align-items: center;
            gap: 0 9.6rem;
        }

        #chairman-message {
            max-height: 100%;
            height: 50.5rem !important;

        }

        #chairman-image {
            max-height: 100%;
            height: 50.5rem !important;
        }

        body[dir="rtl"] #chairman-imag>div>img {
            max-height: 100%;
            height: 50.5rem !important;
        }

        body[dir="rtl"] #chairman-message {
            max-height: 100%;
            height: 46rem !important;
        }

        /*for mobile*/
        @media only screen and (max-width: 768px) {
            #home-video video {
                /*object-fit: cover;*/
                height: 30vh;
                object-position: center;
                padding-bottom: 0;
            }

            .hero {
                max-width: max-content;
                display: flex;
                flex-wrap: wrap;
                padding: 0 1rem;
                overflow-wrap: break-word;
            }

            #heading-primary {
                /*text-align: left;*/
                width: 20rem;
                text-wrap: wrap;
                overflow-wrap: break-word;
                font-size: 3.5rem;

            }

            #hero-description {
                width: 20rem;
                font-size: 1.5rem;
                line-height: 1.5;
                margin-bottom: 4.8rem;
            }

            #primary-button {
                padding: 0.5rem 1rem;
            }

            #secondary-button {
                padding: 0.5rem 1rem;
            }

            /* #chairman-message-wrapper {
                max-height: 100%;
                height: 50.5rem !important;
            } */

            /* #chairman-image>div>img {
                display: none !important;
            } */
            #chairman-image {
                /* display: none !important; */
                max-height: 100%;
                height: 30.5rem !important;
                padding: 0;
            }

            #chairman-message {
                /* display: none; */
                max-height: 100%;
                height: 100%;
                padding: 1rem 1rem;
                border-radius: 1rem;
                margin: 1rem 0rem;
            }

            .margin-right-btn {
                margin-right: 0;
            }
        }

        .heading-primary {
            font-size: 5.2rem;
            color: #e56131;
            font-weight: 700;
            letter-spacing: -0.5px;
            line-height: 1.05;
            margin-bottom: 3.6rem;
        }

        .hero-description {
            font-size: 2rem;
            line-height: 1.5;
            margin-bottom: 4.8rem;
        }

        .hero-img-box {
            grid-column: 2/3;
            grid-row: 1 / 3;
        }

        .hero-img {
            width: 100%;
            border-radius: 2rem;
        }

        .btn:link,
        .btn:visited {
            display: inline-block;
            font-size: 2rem;
            font-weight: 600;
            font-family: inherit;
            border: none;
            cursor: pointer;
            border-radius: 9px;
            /* margin-top: 4.8rem; */
            padding: 1.6rem 3.2rem;
            margin-bottom: 2rem;
            text-decoration: none;

            transition: background-color 500ms;
        }

        .btn--fill:link,
        .btn--fill:visited {
            background-color: #e56131;
            color: #fff;
        }

        .btn--outline:link,
        .btn--outline:visited {
            color: #555;
            background-color: #fff;
        }

        .btn--fill:hover,
        .btn--fill:active {
            background-color: #e56131;
            text-decoration: underline;
        }

        .btn--outline:hover,
        .btn--outline:active {
            background-color: #fdf2e9;
            /* Now we'll not use border as in border the outlines are on the outside. Instead we'll use the outline or box-shadow property */
            box-shadow: inset 0px 0px 0px 3px #fff;
            text-decoration: underline;
            /* outline: #fff solid 3px; */
        }

        /* We'll create a utility class that can be used for any element by simply adding a class. */
        .margin-right-btn {
            margin-right: 2.4rem;
        }

        .delivered-meals {
            display: flex;
            align-items: center;
            gap: 3.2rem;
        }

        .delivered-imgs img {
            width: 4.8rem;
            height: 4.8rem;
            border-radius: 50%;
            margin-right: -1.6rem;
            outline: #fdf2e9 solid 3px;
        }

        .delivered-text {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .delivered-text span {
            color: #cf711f;
        }

        @media only screen and (max-width: 768px) {
            .objectives-inner {
                margin-top: 1rem;
                padding-top: 1rem;
            }
        }
    </style>
    <x-slot:title>
        {{$homepageModel->seo_title ?? 'Arab Private Schools Federation'}}
    </x-slot:title>
    <!--demo video hero-->
    <div id="home-video">
        @if($video)
        <video id="myVideo" autoplay loop muted>
            <source src="{{$video->getUrl()}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div id="customControls">
            <!-- audio icon -->

            <button id="muteButton">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-volume-up" viewBox="0 0 16 16">
                        <path d="M3.293 3.707a1 1 0 0 1 0 1.414L1.414 7H4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H1.414l1.879 1.879a1 1 0 1 1-1.414 1.414L0 13.414A1 1 0 0 1 0 12V4a1 1 0 0 1 1.293-.707l1 1zM6 4.5v7l5 3V1l-5 3z" />
                        <path d="M10.5 5.5a1 1 0 0 1 1.555.832l-.666 2.5a1 1 0 0 1-1.555.832l-.666-.5a1 1 0 0 1 0-1.664l.666-.5a1 1 0 0 1 0-1.664l-.666-.5a1 1 0 0 1-.889-.277z" />
                    </svg>
                </span>
                Mute
            </button>
        </div>
        {{-- <div id="customControls" >--}}
        {{-- audio icon--}}
        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-volume-up" viewBox="0 0 16 16">--}}
        {{-- <path d="M3.293 3.707a1 1 0 0 1 0 1.414L1.414 7H4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H1.414l1.879 1.879a1 1 0 1 1-1.414 1.414L0 13.414A1 1 0 0 1 0 12V4a1 1 0 0 1 1.293-.707l1 1zM6 4.5v7l5 3V1l-5 3z"/>--}}
        {{-- <path d="M10.5 5.5a1 1 0 0 1 1.555.832l-.666 2.5a1 1 0 0 1-1.555.832l-.666-.5a1 1 0 0 1 0-1.664l.666-.5a1 1 0 0 1 0-1.664l-.666-.5a1 1 0 0 1-.889-.277z"/>--}}
        {{-- </svg>--}}

        {{-- <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1">--}}
        {{-- </div>--}}
        @endif
    </div>

    <!-- Hero area start1 -->

    <section class="section-hero">

        <div class="hero">
            <div class="hero-text-box">
                <h1 class="heading-primary" id="heading-primary">
                    {{ __($heroTitle) }}
                </h1>
                <p class="hero-description" id="hero-description">
                    {{__($heroDescriptionOne)}} <br><br>{{__($heroDescriptionTwo)}}
                </p>
                <a id="primary-button" href="{{ route('filament.admin.auth.register') }}" class="btn btn--fill margin-right-btn">{{__('frontend.hero.action')}}
                </a>
                <a id="secondary-button" href="{{route('membership')}}" class="btn btn--outline margin-right-btn">{{__('frontend.hero.learn more')}}
                </a>
            </div>
            <div class="hero-img-box">
                <img src="{{asset('assets/imgs/apsf/home_hero/home-435x472.webp')}}" {{--                    src="https://images.unsplash.com/photo-1604184221837-cd1c5fe094f0?q=80&w=2477&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"--}} alt="Woman enjoying food, meals in storage container, and food bowls on a table" class="hero-img" />
            </div>
            <div class="delivered-meals">
                <div class="delivered-imgs">
                    <img src="https://ui-avatars.com/api/?background=random" alt="Customer photo" />
                    <img src="https://prayagtandon.github.io/Omnifood-Project/Hero-section/img/customers/customer-2.jpg" alt="Customer photo" />
                    <img src="https://ui-avatars.com/api/?name=Khamis+Obaid" alt="Customer photo" />
                    <img src="https://prayagtandon.github.io/Omnifood-Project/Hero-section/img/customers/customer-4.jpg" alt="Customer photo" />
                    <img src="https://prayagtandon.github.io/Omnifood-Project/Hero-section/img/customers/customer-5.jpg" alt="Customer photo" />
                    <img src="https://ui-avatars.com/api/?name=Aminu+Hussain" alt="Customer photo" />
                </div>
                <p class="delivered-text">
                    <span>25+ </span>{{__('frontend.hero.stats')}}
                </p>
            </div>
        </div>
    </section>


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
                        {{-- <div class="service__item-7">--}}
                        {{-- <img src="assets/imgs/apsf/values-icons/communityengagement.webp" alt="">--}}
                        {{-- <h3 class="service__title-7">{{__($valueTitleSix)}}</h3>--}}
                        {{-- <p>{{__($valueDescriptionSix)}}</p>--}}
                        {{-- </div>--}}
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
                <div id="chairman-image" class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="testimonial__video">
                        <img src="{{$chairmanImage}}" alt="Brand Logo" class="chairman-image">
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                    <div id="chairman-message-wrapper" class="testimonial__slider-wrapper-2">
                        <div class="swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide testimonial__slide">
                                    <div id="chairman-message" class="testimonial__inner-2" style="background-color: #f8f1e6;">

                                        <p class="testimonial__text-2 to_justify">{{__($chairmanMessageOne)}} <br><br>{{__($chairmanMessageTwo)}}<br><br>
                                            {{__($chairmanMessageThree)}}
                                        </p>
                                        <div class="chairman-name-title">

                                            <p class="chairman-name">{{__("frontend.chairman.name")}}</p>
                                            <small>{{__("frontend.chairman.title")}}</small>
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
    <!-- Testimonial area end -->









</x-home-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        var video = document.getElementById("myVideo");
        var muteButton = document.getElementById("muteButton");

        // Hide the default controls
        video.controls = false;

        // Set initial button text
        muteButton.textContent = video.muted ? "Unmute" : "Mute";

        // Add event listener for mute button
        muteButton.addEventListener("click", function() {
            if (video.muted) {
                video.muted = false;
                muteButton.textContent = "Mute";
            } else {
                video.muted = true;
                muteButton.textContent = "Unmute";
            }
        });
        // var video = document.getElementById("myVideo");
        // var volumeControl = document.getElementById("volumeControl");
        //
        // // Hide the default controls
        // video.controls = false;
        //
        // // Add event listener for volume control
        // volumeControl.addEventListener("input", function() {
        //     video.volume = volumeControl.value;
        // });

        // document.querySelector('.btn--outline').addEventListener('click', function(event) {
        //     event.preventDefault();
        //     document.querySelector('#content').scrollIntoView({ behavior: 'smooth' });
        //  });


        // const observer = new PerformanceObserver((list) => {
        //     const entries = list.getEntries();
        //     const lastEntry = entries[entries.length - 1]; // Use the latest LCP candidate
        //     console.log("LCP:", lastEntry.startTime);
        //     console.log(lastEntry);
        // });
        // observer.observe({ type: "largest-contentful-paint", buffered: true });


        // let type = navigator.connection.effectiveType;
        //
        // console.log(`Connection type: ${type}`);
        // function updateConnectionStatus() {
        //     console.log(
        //         `Connection type changed from ${type} to ${navigator.connection.effectiveType}`,
        //     );
        //     type = navigator.connection.effectiveType;
        // }
        //
        // navigator.connection.addEventListener("change", updateConnectionStatus);


        // navigator.getBattery().then((battery) => {
        //     function updateAllBatteryInfo() {
        //         updateChargeInfo();
        //         updateLevelInfo();
        //         updateChargingInfo();
        //         updateDischargingInfo();
        //     }
        //     updateAllBatteryInfo();
        //
        //     battery.addEventListener("chargingchange", () => {
        //         updateChargeInfo();
        //     });
        //     function updateChargeInfo() {
        //         console.log(`Battery charging? ${battery.charging ? "Yes" : "No"}`);
        //     }
        //
        //     battery.addEventListener("levelchange", () => {
        //         updateLevelInfo();
        //     });
        //     function updateLevelInfo() {
        //         console.log(`Battery level: ${battery.level * 100}%`);
        //     }
        //
        //     battery.addEventListener("chargingtimechange", () => {
        //         updateChargingInfo();
        //     });
        //     function updateChargingInfo() {
        //         console.log(`Battery charging time: ${battery.chargingTime} seconds`);
        //     }
        //
        //     battery.addEventListener("dischargingtimechange", () => {
        //         updateDischargingInfo();
        //     });
        //     function updateDischargingInfo() {
        //         console.log(`Battery discharging time: ${battery.dischargingTime} seconds`);
        //     }
        // });

        //
        //     // check compatibility
        // if (!("BarcodeDetector" in globalThis)) {
        // console.log("Barcode Detector is not supported by this browser.");
        // } else {
        // console.log("Barcode Detector supported!");
        //
        // // create new detector
        // const barcodeDetector = new BarcodeDetector({
        // formats: ["code_39", "codabar", "ean_13"],
        // });
        //
        // barcodeDetector
        //     .detect(imageEl)
        //     .then((barcodes) => {
        //         barcodes.forEach((barcode) => console.log(barcode.rawValue));
        //     })
        //     .catch((err) => {
        //         console.log(err);
        //     });
        //
        // }



    });
</script>