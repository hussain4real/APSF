<x-home-layout>

{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    @php
    $aboutUsModel = \Illuminate\Support\Facades\Cache::remember('about_us', 60*60*24, function () {
        return \App\Models\AboutPage::first();
    });
//    dd($aboutUsModel);
    $heroTitle = $aboutUsModel->hero_title ?? null;
    $heroDescriptionOne = $aboutUsModel->hero_description_one ?? null;
    $heroDescriptionTwo = $aboutUsModel->hero_description_two ?? null;
    $heroDescriptionThree = $aboutUsModel->hero_description_three ?? null;
    $heroDescriptionFour = $aboutUsModel->hero_description_four ?? null;
    $objectiveHeading = $aboutUsModel->objective_heading ?? null;
    $objectiveTitleOne = $aboutUsModel->objective_title_one ?? null;
    $objectiveDescriptionOne = $aboutUsModel->objective_description_one ?? null;
    $objectiveTitleTwo = $aboutUsModel->objective_title_two ?? null;
    $objectiveDescriptionTwo = $aboutUsModel->objective_description_two ?? null;
    $objectiveTitleThree = $aboutUsModel->objective_title_three ?? null;
    $objectiveDescriptionThree = $aboutUsModel->objective_description_three ?? null;
    $objectiveTitleFour = $aboutUsModel->objective_title_four ?? null;
    $objectiveDescriptionFour = $aboutUsModel->objective_description_four ?? null;
    $objectiveTitleFive = $aboutUsModel->objective_title_five ?? null;
    $objectiveDescriptionFive = $aboutUsModel->objective_description_five ?? null;
    $objectiveTitleSix = $aboutUsModel->objective_title_six ?? null;
    $objectiveDescriptionSix = $aboutUsModel->objective_description_six ?? null;
    $objectiveTitleSeven = $aboutUsModel->objective_title_seven ?? null;
    $objectiveDescriptionSeven = $aboutUsModel->objective_description_seven ?? null;
    $objectiveTitleEight = $aboutUsModel->objective_title_eight ?? null;
    $objectiveDescriptionEight = $aboutUsModel->objective_description_eight ?? null;
    $objectiveTitleNine = $aboutUsModel->objective_title_nine ?? null;
    $objectiveDescriptionNine = $aboutUsModel->objective_description_nine ?? null;
    $objectiveTitleTen = $aboutUsModel->objective_title_ten ?? null;
    $objectiveDescriptionTen = $aboutUsModel->objective_description_ten ?? null;
    $objectiveTitleEleven = $aboutUsModel->objective_title_eleven ?? null;
    $objectiveDescriptionEleven = $aboutUsModel->objective_description_eleven ?? null;
    $objectiveTitleTwelve = $aboutUsModel->objective_title_twelve ?? null;
    $objectiveDescriptionTwelve = $aboutUsModel->objective_description_twelve ?? null;
    @endphp

    <x-slot:title>
        {{$aboutUsModel->seo_title ?? 'About Arab Private schools Federation'}}
    </x-slot:title>
    <!-- Story area start -->
    <section class="story__area">
        <div class="container pt-140">
            <span class="line-3"></span>
            <div class="sec-title-wrapper">
                <h2 class="sec-sub-title title-anim">{{__("frontend.about.name")}}</h2>
                <h3 class="sec-title title-anim orange_color">{{__($heroTitle)}}</h3>
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5" id="about-hero">
                        <br><br>
{{--                        <img src="{{asset('assets/imgs/apsf/who-we-are/Hamid AlQasimi-01-62.jpg')}}" alt="Who We Are">--}}
                        <img src="{{asset('assets/imgs/apsf/who-we-are/meeting copy.webp')}}" alt="Who We Are">
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 " id="about-description">
                        <div class="story__text ">
                            <p class="animate_content to_justify">{{__($heroDescriptionOne)}}</p>
                            <p class="animate_content to_justify">{{__($heroDescriptionTwo)}}</p>
                            <p class="animate_content to_justify"> {{__($heroDescriptionThree)}}<br><br>{{__($heroDescriptionFour)}}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Story area end --><br><br><br><br><br><br><br><br><br><br>

    <!-- FAQ area start -->
    <section class="faq__area">
        <div class="container pb-140">
            <div class="line-3"></div>
{{--            row--}}
            <div class="faq-container">

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="faq__content">
                        <h2 class="faq__title title-anim">{{__($objectiveHeading)}}</h2>

                        <div class="faq__list">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{__($objectiveTitleOne)}}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionOne)}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            {{__($objectiveTitleTwo)}}
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionTwo)}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            {{__($objectiveTitleThree)}}
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionThree)}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            {{__($objectiveTitleFour)}}
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionFour)}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            {{__($objectiveTitleFive)}}
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionFive)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            {{($objectiveTitleSix)}}
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionSix)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            {{__($objectiveTitleSeven)}}
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionSeven)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEight">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            {{__($objectiveTitleEight)}}
                                        </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionEight)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingNine">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                            {{__($objectiveTitleNine)}}
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{__($objectiveDescriptionNine)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                            {{__($objectiveTitleTen)}}
                                        </button>
                                    </h2>
                                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {{__($objectiveDescriptionTen)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEleven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                            {{__($objectiveTitleEleven)}}
                                        </button>
                                    </h2>
                                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {{__($objectiveDescriptionEleven)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwelve">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseEleven">
                                            {{__($objectiveTitleTwelve)}}
                                        </button>
                                    </h2>
                                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingEleven"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {{__($objectiveDescriptionTwelve)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6"--}}
                <div >
                    <div id="objective-video">
                        <video id="myVideo" autoplay loop controls muted>
                            <source src="{{asset('assets/imgs/apsf/objectives/objectives_video.mp4')}}" type="video/mp4" >
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ area end -->


<style>
    #about-hero img {
        width: 100%;
        height: 80vh;
        object-fit: cover;
        border-radius: 2rem;
    }
    #about-description{
        margin-top: 14px;
    }

    /*for mobile*/
    @media only screen and (max-width: 768px) {
        #about-hero img {
            height: 50vh;
            margin-top: 1rem;
        }

        #objective-video video{
            height: 50vh;
            width:23rem;
            object-fit: contain;
            border-radius: 2rem;
        }
    }

    #objective-video{
        display:flex;
        position: relative;
        max-width: 100%;
        max-height: 100%;
        justify-content: end;
        align-items: end;

        margin-top: 6rem;
    }
    #objective-video video{
        /*width: 100%;*/
        /*height: 94vh;*/
        object-fit: cover;
        border-radius: 2rem;
        /*padding-bottom: 2rem;*/


    }
    #customControls{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0,0,0,0.1);
        padding: 1rem;
        z-index: 100;
    }

    #muteButton{
        background-color: #e56131;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        opacity: 0; /* Hide the button initially */
        transition: opacity 0.5s; /* Smooth transition */
    }
    #home-video:hover #muteButton{
        opacity: 1; /* Show the button on hover */
    }
</style>

</x-home-layout>

