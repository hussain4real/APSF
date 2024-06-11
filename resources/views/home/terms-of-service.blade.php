<x-home-layout>

    <!-- Terms of Service area start -->
    <section class="faq__area-6">
        <div class="container pt-130 pb-140">
            <div class="line-3"></div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2  orange_color">{{__('frontend.terms_of_service')}}</h2>
                        <h2 class=" orange_color my-4">{{__('frontend.introduction.title')}}</h2>
                        <p class="">{{__('frontend.introduction.text')}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="faq__list-6">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{__('frontend.use_of_the_portal.title')}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.use_of_the_portal.eligibility.title')}}</h4>
                                        <p>{{__('frontend.use_of_the_portal.eligibility.text')}}</p>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.use_of_the_portal.account_registration.title')}}</h4>
                                        <p>{{__('frontend.use_of_the_portal.account_registration.text')}}</p>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.use_of_the_portal.user_responsibilities.title')}}</h4>
                                        <p>{{__('frontend.use_of_the_portal.user_responsibilities.text')}}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- second accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{__('frontend.privacy_and_data_protection.title')}}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.privacy_and_data_protection.personal_information.title')}}</h4>
                                        <p>{{__('frontend.privacy_and_data_protection.personal_information.text')}}</p>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.privacy_and_data_protection.data_security.title')}}</h4>
                                        <p>{{__('frontend.privacy_and_data_protection.data_security.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of second accordion -->
                            <!-- third accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{__('frontend.acceptable_use.title')}}
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.acceptable_use.prohibited_activities.title')}}</h4>

                                        <p>{{__('frontend.acceptable_use.prohibited_activities.list.use_unlawful_purpose')}}</p>
                                        <p>{{__('frontend.acceptable_use.prohibited_activities.list.upload_offensive_content')}}</p>
                                        <p>{{__('frontend.acceptable_use.prohibited_activities.list.interfere_operation')}}</p>
                                        <p>{{__('frontend.acceptable_use.prohibited_activities.list.unauthorized_access')}}</p>

                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.acceptable_use.content_ownership.title')}}</h4>
                                        <p>{{__('frontend.acceptable_use.content_ownership.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of third accordion -->
                            <!-- fourth accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        {{__('frontend.termination.title')}}
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.termination.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of fourth accordion -->
                            <!-- fifth accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        {{__('frontend.disclaimers_and_limitation_of_liability.title')}}
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.disclaimers_and_limitation_of_liability.disclaimers.title')}}</h4>
                                        <p class="mb-2">{{__('frontend.disclaimers_and_limitation_of_liability.disclaimers.text')}}</p>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-2">{{__('frontend.disclaimers_and_limitation_of_liability.limitation_of_liability.title')}}</h4>
                                        <p>{{__('frontend.disclaimers_and_limitation_of_liability.limitation_of_liability.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of fifth accordion -->
                            <!-- sixth accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        {{__('frontend.governing_law.title')}}
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.governing_law.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of sixth accordion -->
                            <!-- seventh accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        {{__('frontend.changes_to_the_terms.title')}}
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.changes_to_the_terms.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of seventh accordion -->
                            <!-- eighth accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        {{__('frontend.contact_us.title')}}
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.contact_us.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of eighth accordion -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- acknowledgement section-->
        <div class="my-5 mx-5 py-3 px-5 text-bg-secondary fs-3 text-warning rounded-3">{{__('frontend.acknowledgment')}}</div>
        <!-- end of acknowledgement section-->
    </section>

    <!-- Terms of Service area end -->
</x-home-layout>