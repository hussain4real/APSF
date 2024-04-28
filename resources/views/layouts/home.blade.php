<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Arab Private Schools Federation">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="APSF">
    <meta name="twitter:description"
          content="Arab Private Schools Federation">
    <meta name="twitter:image" content="{{ asset('assets/images/apsflogo_271x69.webp') }}">
    <meta property="og:title" content="Fooddi">
    <meta property="og:description"
          content="Arab Private Schools Federation">
    <meta property="og:image" content="{{ asset('assets/images/apsflogo_271x69.webp') }}" og:image:width="1200"
          og:image:height="630" og:type="website">
    <meta property="og:url" content="https://arab-psf.com">

    <link rel="manifest" href="{{asset('assets/images/site.webmanifest')}}">
    <title>Home - Arab Private Schools Federation</title>

    <!-- Fav Icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/imgs/apsf/logo/apsf_favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/imgs/apsf/logo/apsf_favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- All CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/progressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
    {{-- <link rel="stylesheet" href="style.css"> --}}






    @vite('public/assets/css/master.css')
{{--    @vite('resources/css/app.css')--}}
</head>

<body >
@php
$homepageModel = \App\Models\Homepage::get([
    'partners_title',
    'partners_description',
    'member_action_text',
    'member_action_url',
    'member_description',
    'newsletter_title',
    'newsletter_description',
    ])->first();



    $partnersTitle = $homepageModel->partners_title ?? null;
    $partnersDescription = $homepageModel->partners_description ?? null;
    $memberActionText = $homepageModel->member_action_text ?? null;
    $memberActionUrl = $homepageModel->member_action_url ?? null;
    $memberDescription = $homepageModel->member_description ?? null;
    $newsletterTitle = $homepageModel->newsletter_title ?? null;
    $newsletterDescription = $homepageModel->newsletter_description ?? null;

@endphp
{{--dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}"--}}
<!-- Cursor Animation -->
<div class="cursor1"></div>
<div class="cursor2"></div>

<!-- Team Cursor -->
<div class="cursor" id="team_cursor">Drag</div>


<!-- Preloader -->
<div class="preloader">
    <div class="loading">
        <div class="bar bar1"></div>
        <div class="bar bar2"></div>
        <div class="bar bar3"></div>
        <div class="bar bar4"></div>
        <div class="bar bar5"></div>
        <div class="bar bar6"></div>
        <div class="bar bar7"></div>
        <div class="bar bar8"></div>
    </div>
</div>



<!-- Switcher Area Start -->
<div class="switcher__area">
    <div class="switcher__icon">
        <button id="switcher_open"><i class="fa-solid fa-gear"></i></button>
        <button id="switcher_close"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <div class="switcher__items">
        <div class="switcher__item">
            <div class="switch__title-wrap">
                <h2 class="switcher__title">Cursor</h2>
            </div>
            <div class="switcher__btn">
                <select name="cursor-style" id="cursor_style">
                    <option value="1">default</option>
                    <option selected value="2">animated</option>
                </select>
            </div>
        </div>

        <div class="switcher__item">
            <div class="switch__title-wrap">
                <h2 class="switcher__title">mode</h2>
            </div>
            <div class="switcher__btn mode-type wc-col-2">
                <button class="active" data-mode="light">light</button>
                <button data-mode="dark">dark</button>
            </div>
        </div>

        <div class="switcher__item">
            <div class="switch__title-wrap">
                <h2 class="switcher__title">Direction</h2>
            </div>
            <div class="switcher__btn lang_dir wc-col-2">
                <button class="{{App::isLocale('en') ? 'active' : ''}}" data-mode="{{ App::isLocale('en') ? 'ltr' : 'rtl' }}">LTR</button>
                <button class="{{App::isLocale('ar') ? 'active' : ''}}" data-mode="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">RTL</button>
            </div>
        </div>

        <div class="switcher__item">
            <div class="switch__title-wrap">
                <h2 class="switcher__title">Language Support</h2>
            </div>
            <div class="switcher__btn lang_dir wc-col-2">
                <button class="{{App::isLocale('en') ? 'active' : ''}}" data-mode="{{ App::isLocale('en') ? 'ltr' : 'rtl' }}">LTR</button>
                <button class="{{App::isLocale('ar') ? 'active' : ''}}" data-mode="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">RTL</button>
            </div>
        </div>
    </div>
</div>
<!-- Switcher Area End -->



<!-- Scroll Smoother -->
<div class="has-smooth" id="has_smooth"></div>


<!-- Go Top Button -->
<button id="scroll_top" class="scroll-top"><i class="fa-solid fa-arrow-up"></i></button>

<!-- Header area start -->

    <livewire:layout.home-navigation />

    <!-- Header area end -->



    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>

                {{ $slot }}
                <!-- Brand area start -->
                <section class="brand__area">
                    <div class="container g-0 line pt-140 pb-140">
                        <span class="line-3"></span>
                        <div class="row g-0">
                            <div class="col-xxl-12">
                                <div class="sec-title-wrapper">
                                    <h2 class="sec-sub-title title-anim orange_color">{{__($partnersTitle)}}</h2>
                                    <h3 class="sec-title title-anim">{{__($partnersDescription)}}</h3>
                                </div>
                            </div>
                            <div class="brand__list-3">
                                <div class="brand__item-2 fade_bottom">
                                    <img src="assets/imgs/apsf/partners/tamkeen.webp" alt="Brand Logo">
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <img src="assets/imgs/apsf/partners/aief.webp" alt="Brand Logo">
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <img src="assets/imgs/apsf/partners/uv.webp" alt="Brand Logo">
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <img src="assets/imgs/apsf/partners/ge.webp" alt="Brand Logo">
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- Brand area end -->

                <!-- Dashboard start -->
                <section class="brand__area" style="background-color: #f8f1e6;">
                    <div class="container g-0 line pt-140 pb-140">
                        <span class="line-3"></span>
                        <div class="row g-0">
                            <div class="col-xxl-12">
                                <div class="sec-title-wrapper">
                                    <h3 class="sec-title title-anim orange_color">Statistics</h3>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="assets/imgs/apsf/dashboard/students.webp" alt="Brand Logo"><br><br>
                                <h1>829</h1>
                                <h2>Students</h2>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="assets/imgs/apsf/dashboard/teachers.webp" alt="Brand Logo"><br><br>
                                <h1>483</h1>
                                <h2>Teachers</h2>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="assets/imgs/apsf/dashboard/contractors.webp" alt="Brand Logo"><br><br>
                                <h1>620</h1>
                                <h2>Contractors</h2>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="assets/imgs/apsf/dashboard/institutions.webp" alt="Brand Logo"><br><br>
                                <h1>150</h1>
                                <h2>Institutions</h2>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard end -->

                <!-- CTA area start -->
                <section class="cta__area cta__area-7 pt-130">
                    <div class="container pb-110">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="cta__content">
                                    <!-- <p class="cta__sub-title">Sign Up Now!</p> -->
                                    <h2 class="cta__title title-anim">{{__($memberDescription)}}</h2>
                                    <div class="btn_wrapper">
                                        <a href="#" class="wc-btn-primary btn-hover btn-item"><span></span>{{__($memberActionText)}}<i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- CTA area end -->



            </main>



            <!-- Footer area start -->
            <footer class="footer__area-2 pt-130">
                <div class="container">
                    <div class="footer__top-2 text-anim">
                        <div class="row">
                            <div class="col-xxl-12">
                                <h2 class="sec-title-3 title-anim orange_color">{{__($newsletterTitle)}}</h2>
                                <p class="footer__sub-title">{{__($newsletterDescription)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="footer__middle-2">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="footer__location-2">
                                    <div class="location">
                                        <h3>{{__("frontend.address.title")}}</h3>
                                        <p>{{__("frontend.address.description")}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="footer__subscribe-2">
                                    <form action="#">
                                        <input type="text" name="email" placeholder="{{__("frontend.input.email")}}">
                                        <button type="submit" class="submit"><img src="assets/imgs/apsf/icon/arrow-black.png"
                                                                                  alt="Arrow Icon"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer__btm-2">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5">
                                <div class="footer__copyright-2">
                                    <p>{{__("frontend.copyright")}}</p>
                                </div>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7">
                                <div class="footer__nav">
                                    <ul class="footer-menu menu-anim">
                                        <li><a href="about.html">{{__("nav.About Us")}}</a></li>
                                        <li><a href="contact.html">{{__("nav.Contact")}}</a></li>
                                        <li><a href="faq.html">{{__("nav.Faqs")}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer area end -->


        </div>
    </div>


<script>
    window.onload = function() {
        var ltrButton = document.querySelector('button[data-mode="ltr"]');
        var rtlButton = document.querySelector('button[data-mode="rtl"]');

        if (ltrButton && ltrButton.getAttribute('data-mode') === 'ltr') {
            ltrButton.click();
            console.log('ltr');
        } else if (rtlButton && rtlButton.getAttribute('data-mode') === 'rtl') {
            rtlButton.click();
            console.log('rtl');
        }
    }
</script>
<!-- All JS files -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <script src="assets/js/ScrollSmoother.min.js"></script>
    <script src="assets/js/SplitText.min.js"></script>
    <script src="assets/js/chroma.min.js"></script>
    <script src="assets/js/mixitup.min.js"></script>
    <script src="assets/js/vanilla-tilt.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/main.js"></script>

    @livewire('notifications')

</body>

</html>
