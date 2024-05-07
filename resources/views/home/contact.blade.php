<x-home-layout>
    <!-- Contact area start -->
    <section class="contact__area-6">
        <div class="container g-0 line pt-120 pb-110">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2 orange_color">{{__("frontend.contact.heading")}}</h2>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="contact__text">
                        <p class="rodel">{{__("frontend.contact.title")}} </p>
                    </div>
                </div>
            </div>
            <div class="row contact__btm">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="contact__info">
                        <h3 class="sub-title-anim-top ">{{__("frontend.contact.description")}}<br>{{__("frontend.contact.miniDescription")}}</h3>
                        <ul>
                            <li><a href="mailto:info@arab-psf.com">info@arab-psf.com</a></li>
                            <li><span>{{__("frontend.address.title")}}</span></li>
{{--                            <li><span>{{__("frontend.address.description")}}</span></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                    <div class="contact__form">
                        <form action="assets/mail.php" method="POST">
                            <div class="row g-3">
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="text" name="name" placeholder="{{__("frontend.contact.name")}} *">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="email" name="email" placeholder="{{__("frontend.contact.email")}} *">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="text" name="phone" placeholder="{{__("frontend.contact.phone")}}">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="text" name="subject" placeholder="{{__("frontend.contact.subject")}} *">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <textarea name="message" placeholder="{{__("frontend.contact.message")}} *"></textarea>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="btn_wrapper">
                                        <button class="wc-btn-primary btn-hover btn-item orange_color2"><span></span> {{__("frontend.contact.action1")}} <br>{{__("frontend.contact.action2")}} <i
                                                class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact area end -->
</x-home-layout>
