<x-home-layout>

    <!-- Privacy Policy area start -->
    <section class="faq__area-6">
        <div class="container pt-130 pb-140">
            <div class="line-3"></div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2  orange_color">{{__('frontend.privacy_policy')}}</h2>
                        <h2 class=" orange_color my-4">{{__('frontend.introduction_privacy.title')}}</h2>
                        <p class="">{{__('frontend.introduction_privacy.text')}}

                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="faq__list-6">
                        <div class="accordion" id="accordionExample">
                            <!--first accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        {{__('frontend.information_collection.title')}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">
                                            {{__('frontend.information_collection.information_you_provide.title')}}
                                        </h4>
                                        <p>{{__('frontend.information_collection.information_you_provide.text')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.information_collection.information_you_provide.list.full_name')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_you_provide.list.email_address')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_you_provide.list.phone_number')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_you_provide.list.school_related_information')}}</li>
                                        </ul>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">
                                            {{__('frontend.information_collection.information_collected_automatically.title')}}
                                        </h4>
                                        <p>{{__('frontend.information_collection.information_collected_automatically.text')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.information_collection.information_collected_automatically.list.ip_address')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_collected_automatically.list.ip_address')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_collected_automatically.list.browser_type')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_collected_automatically.list.pages_visited')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_collected_automatically.list.time_and_date_of_visits')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_collection.information_collected_automatically.list.usage_data')}}</li>

                                    </div>
                                </div>
                            </div>
                            <!-- end first accordion-->

                            <!--second accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{__('frontend.use_of_information.title')}}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.use_of_information.text')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.use_of_information.list.provide_maintain_improve_services')}}</li>
                                            <li class="list-group-item">{{__('frontend.use_of_information.list.communicate_with_users')}}</li>
                                            <li class="list-group-item">{{__('frontend.use_of_information.list.send_notifications_updates')}}</li>
                                            <li class="list-group-item">{{__('frontend.use_of_information.list.prevent_illegal_activities')}}</li>
                                            <li class="list-group-item">{{__('frontend.use_of_information.list.enhance_user_experience')}}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- end second accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{__('frontend.information_sharing.title')}}
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">
                                            {{__('frontend.information_sharing.third_parties.title')}}
                                        </h4>
                                        <p>{{__('frontend.information_sharing.third_parties.text')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.information_sharing.third_parties.list.with_consent')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_sharing.third_parties.list.to_comply_with_laws')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_sharing.third_parties.list.to_protect_rights')}}</li>
                                            <li class="list-group-item">{{__('frontend.information_sharing.third_parties.list.with_service_providers')}}</li>

                                        </ul>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">
                                            {{__('frontend.information_sharing.third_party_links.title')}}
                                        </h4>
                                        <p>{{__('frontend.information_sharing.third_party_links.text')}}</p>

                                    </div>
                                </div>
                            </div>
                            <!--third accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        {{__('frontend.information_protection.title')}}
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.information_protection.text')}}</p>

                                    </div>
                                </div>
                            </div>
                            <!-- end third accordion-->

                            <!--fourth accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        {{__('frontend.your_rights.title')}}
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.your_rights.access_and_correction')}}</p>
                                        <p>{{__('frontend.your_rights.deletion')}}</p>
                                        <p>{{__('frontend.your_rights.objection')}}</p>

                                    </div>
                                </div>
                            </div>
                            <!-- end fourth accordion-->

                            <!--fifth accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        {{__('frontend.changes_to_the_privacy_policy.title')}}
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.changes_to_the_privacy_policy.text')}}</p>

                                    </div>
                                </div>
                            </div>
                            <!-- end fifth accordion-->

                            <!--sixth accordion-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        {{__('frontend.contact_us.title')}}
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.contact_us.text')}}</p>
                                        <address class="d-flex flex-column">
                                            <strong class="fs-4">{{__('frontend.contact_us.email')}}</strong><br>
                                            <a class="p-2" href="mailto:info@arab-psf.com">
                                                <i class="fas fa-envelope"></i>
                                                <span>
                                                    {{__('frontend.contact_us.email')}}
                                                </span>
                                            </a>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <!-- end sixth accordion-->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- acknowledgement section-->
        <div class="mx-5 py-3 px-5 text-bg-secondary fs-3 text-warning rounded-3">{{__('frontend.acknowledgment_privacy')}}</div>
        <!-- end of acknowledgement section-->
    </section>

    <!-- Privacy Policy area end -->
</x-home-layout>