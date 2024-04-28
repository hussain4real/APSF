<x-home-layout>
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
    @endphp
    <!-- Story area start -->
    <section class="story__area">
        <div class="container g-0 line pt-140">
            <span class="line-3"></span>
            <div class="sec-title-wrapper">

                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                        <h2 class="sec-sub-title title-anim">Arab Private Schools Federation</h2>
                        <h3 class="sec-title title-anim orange_color">{{__($heroTitle)}}</h3>
                        <br><br>
                        <img src="assets/imgs/apsf/who-we-are/who-we-are.webp" alt="Who We Are">
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                        <div class="story__text">
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
        <div class="container g-0 line pb-140">
            <div class="line-3"></div>
            <div class="row">

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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div style="padding-left: 50px;">
                        <img src="assets/imgs/apsf/objectives/objectives.webp" alt="FAQ Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ area end -->





</x-home-layout>
