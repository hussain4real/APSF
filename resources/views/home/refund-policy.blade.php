<x-home-layout>

    <!-- Refund Policy area start -->
    <section class="faq__area-6">
        <div class="container pt-130 pb-140">
            <div class="line-3"></div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2 animation__char_come orange_color">{{__('frontend.refund_policy')}}</h2>
                        <h4 class="orange_color">{{__('frontend.introduction_refund.title')}}</h4>
                        <p class="">
                            {{__('frontend.introduction_refund.text')}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="faq__list-6">
                        <div class="accordion" id="accordionExample">
                            <!-- first accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{__('frontend.general_refund_policy.title')}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">{{__('frontend.general_refund_policy.eligibility_for_refunds.title')}}</h4>
                                        <p>{{__('frontend.general_refund_policy.eligibility_for_refunds.conditions')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.general_refund_policy.eligibility_for_refunds.conditions_list.not_as_described')}}</li>
                                            <li class="list-group-item">{{__('frontend.general_refund_policy.eligibility_for_refunds.conditions_list.not_delivered_or_accessed')}}</li>
                                            <li class="list-group-item">{{__('frontend.general_refund_policy.eligibility_for_refunds.conditions_list.cancellation_within_time_frame')}}</li>
                                        </ul>

                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">{{__('frontend.general_refund_policy.refund_request_time_frame.title')}}</h4>
                                        <p>{{__('frontend.general_refund_policy.refund_request_time_frame.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of first accordion -->

                            <!-- second accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{__('frontend.refund_request_process.title')}}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">{{__('frontend.refund_request_process.refund_request_process.title')}}</h4>
                                        <p>{{__('frontend.refund_request_process.refund_request_process.steps')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.refund_request_process.refund_request_process.steps_list.contact_support')}}</li>
                                            <li class="list-group-item">{{__('frontend.refund_request_process.refund_request_process.steps_list.review_and_additional_info')}}</li>
                                            <li class="list-group-item">{{__('frontend.refund_request_process.refund_request_process.steps_list.response_within_7_days')}}</li>
                                        </ul>
                                    </div>
                                    <div class="accordion-body">
                                        <h4 class="orange_color mb-4">{{__('frontend.refund_request_process.approval_and_processing.title')}}</h4>
                                        <p>{{__('frontend.refund_request_process.approval_and_processing.text')}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of second accordion -->

                            <!-- third accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{__('frontend.non_refundable_items.title')}}
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.non_refundable_items.non_refundable_items')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.non_refundable_items.items_list.fully_delivered_and_accessed')}}</li>
                                            <li class="list-group-item">{{__('frontend.non_refundable_items.items_list.subscription_fees')}}</li>
                                            <li class="list-group-item">{{__('frontend.non_refundable_items.items_list.explicitly_marked')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end of third accordion -->

                            <!-- fourth accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        {{__('frontend.partial_refunds.title')}}
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{{__('frontend.partial_refunds.circumstances')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('frontend.partial_refunds.circumstances_list.partial_delivery_due_to_technical_issues')}}</li>
                                            <li class="list-group-item">{{__('frontend.partial_refunds.circumstances_list.user_cancellation_before_full_access')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end of fourth accordion -->

                            <!-- fifth accordion -->
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
                            <!-- end of fifth accordion -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- acknowledgement section-->
        <div class="mx-5 py-3 px-5 text-bg-secondary fs-3 text-warning rounded-3">{{__('frontend.acknowledgment_refund')}}</div>
        <!-- end of acknowledgement section-->
    </section>
    <!-- Refund Policy area end -->
</x-home-layout>