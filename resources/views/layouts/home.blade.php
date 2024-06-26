<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E3850F0QGW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-E3850F0QGW');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Arab Private Schools Federation">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="APSF">
    <meta name="twitter:description" content="Arab Private Schools Federation">
    <meta name="twitter:image" content="{{ asset('assets/imgs/apsflogo_271x69.webp') }}">
    <meta property="og:title" content="APSF">
    <meta property="og:description" content="Arab Private Schools Federation">
    <meta property="og:image" content="{{ asset('assets/imgs/apsflogo_271x69.webp') }}" og:image:width="1200" og:image:height="630" og:type="website">
    <meta property="og:url" content="https://arab-psf.com">

    <link rel="shortcut icon" href="{{ asset('assets/imgs/logo/apsf_favicon.png') }}" type="image/png">



    <title>{{ $title ?? 'Home - Arab Private Schools Federation'}}</title>

    <!-- Fav Icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/imgs/apsf/logo/apsf_favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/imgs/apsf/logo/apsf_favicon.png') }}">

    <!-- Google Fonts -->
    <!-- All CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/progressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
    {{-- <link rel="stylesheet" href="style.css"> --}}



    @vite('public/assets/css/master.css')
    {{-- @vite('resources/css/app.css')--}}
    <style type="text/css">
        @font-face {
            font-family: Bahij_TheSansArabic-Plain;
            src: url('{{ asset(' assets/fonts/Bahij_TheSansArabic-Plain.ttf') }}') format('truetype');
            font-weight: normal;
        }

        body {
            font-family: 'Bahij_TheSansArabic-Plain', sans-serif;
        }

        .social-icon {
            padding: 1rem 0.5rem 0 0;
            display: flex;
            justify-content: start;
            align-items: center;
            gap: 2rem;
            color: teal;
        }

        .social-icon i,
        svg {
            color: #033731;
        }

        .social-icon i:hover,
        svg:hover {
            /* add fa-beat class */
            animation: fa-beat 1s infinite;
        }

        .partner_logos {
            padding-top: 2rem;
            /* padding-left: 2rem;
            padding-right: 2rem; */
            max-width: 100%;
            max-height: 100%;
            height: 11rem;
        }

        #kno360 {
            margin: 0 1.5rem;
        }

        #genex {
            height: 8rem;
            margin-top: 1rem;
        }

        /*modal section start*/


        /*modal section end*/
    </style>
</head>

<body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    @php
    $homepageModel = \Illuminate\Support\Facades\Cache::remember('layout', 60*60*24, function () {
    return \App\Models\Homepage::get([
    'partners_title',
    'partners_description',
    'member_action_text',
    'member_action_url',
    'member_description',
    'newsletter_title',
    'newsletter_description',
    ])->first();
    });



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
                    <button class="active" data-mode="ltr">LTR</button>
                    <button data-mode="rtl">RTL</button>
                    {{-- <button class="{{App::isLocale('en') ? 'active' : ''}}" data-mode="{{ App::isLocale('en') ? 'ltr' : 'rtl' }}">LTR</button>--}}
                    {{-- <button class="{{App::isLocale('ar') ? 'active' : ''}}" data-mode="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">RTL</button>--}}
                </div>
            </div>

            <div class="switcher__item">
                <div class="switch__title-wrap">
                    <h2 class="switcher__title">Language Support</h2>
                </div>
                <div class="switcher__btn lang_dir wc-col-2">
                    <button class="active" data-mode="ltr">LTR</button>
                    <button data-mode="rtl">RTL</button>
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

    <!-- modal section start -->


    <!-- modal section end -->

    <!-- Header area end -->




    <!-- <div class="container mx-5">
        <div class="ticker">
            <div class="title">
                <h5>Notice!</h5>
            </div>
            <div class="news">
                <marquee class="news-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>



                </marquee>
            </div>
        </div>
    </div> -->
    <div id="smooth-wrapper">

        <div id="smooth-content">
            <main class="main-content">

                {{ $slot }}
                <!-- Brand area start -->
                <section class="brand__area">
                    <div class="container pt-140 pb-140">
                        <span class="line-3"></span>
                        <div class="row g-0">
                            <div class="col-xxl-12">
                                <div class="sec-title-wrapper">
                                    <h2 class="sec-sub-title title-anim orange_color">{{__($partnersTitle)}}</h2>
                                    <h3 class="sec-title title-anim">{{__($partnersDescription)}}</h3>
                                </div>
                            </div>
                            <div id="brands-wrapper" class="brand__list-3">
                                <div class="brand__item-2 fade_bottom">
                                    <a href="https://tamkeen-edu.com/en/" target="_blank">

                                        <img src="{{asset('assets/imgs/apsf/partners/logotamkeen.webp')}}" alt="Brand Logo" class="partner_logos">
                                    </a>
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <a href="https://www.amief.org/" target="_blank">

                                        <img src="{{asset('assets/imgs/apsf/partners/amief.png')}}" alt="Brand Logo" class="partner_logos">
                                    </a>
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <a href="https://uovl.uk/" target="_blank">

                                        <img src="{{asset('assets/imgs/apsf/partners/university_of_victoria.webp')}}" alt="Brand Logo" class="partner_logos">
                                    </a>
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <a href="https://genexinstitute.com/" target="_blank">

                                        <img src="{{asset('assets/imgs/apsf/partners/genex.png')}}" alt="Brand Logo" class="partner_logos" id="genex">
                                    </a>
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <a href="https://kno-360.com/" target="_blank">
                                        <img src="{{asset('assets/imgs/apsf/partners/KNO360.svg')}}" alt="Brand Logo" class="partner_logos" id="kno360">
                                    </a>
                                </div>
                                <div class="brand__item-2 fade_bottom">
                                    <a href="https://kno-360.com/" target="_blank">
                                        <img src="{{asset('assets/imgs/apsf/partners/UNESCO-Logo_1.png')}}" alt="Brand Logo" class="partner_logos" id="unesco">
                                    </a>
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
                                    <h3 class="sec-title title-anim orange_color">{{__("frontend.stats.heading")}}</h3>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="{{asset('assets/imgs/apsf/dashboard/students.webp')}}" alt="Brand Logo"><br><br>
                                <h1 id="studentCount">829</h1>
                                <h2>{{__("frontend.stats.student")}}</h2>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="{{asset('assets/imgs/apsf/dashboard/teachers.webp')}}" alt="Brand Logo"><br><br>
                                <h1 id="teacherCount">483</h1>
                                <h2>{{__("frontend.stats.teacher")}}</h2>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="{{asset('assets/imgs/apsf/dashboard/contractors.webp')}}" alt="Brand Logo"><br><br>
                                <h1 id="contractorCount">620</h1>
                                <h2>{{__("frontend.stats.contractor")}}</h2>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4" style="text-align: center;">
                                <img src="{{asset('assets/imgs/apsf/dashboard/institutions.webp')}}" alt="Brand Logo"><br><br>
                                <h1 id="institutionCount">150</h1>
                                <h2>{{__("frontend.stats.institution")}}</h2>
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
                                        <a href="{{ route('filament.admin.auth.register') }}" class="wc-btn-primary btn-hover btn-item"><span></span>{{__($memberActionText)}}<i class="fa-solid fa-arrow-right"></i></a>
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
                    <div class="footer__top-2 ">
                        <div class="row">
                            <div class="col-xxl-12">
                                <h2 class="sec-title-2 orange_color">{{__($newsletterTitle)}}</h2>
                                <p class="footer__sub-title">{{__($newsletterDescription)}}</p>
                            </div>
                        </div>
                    </div>

                    @include('public-vote')
                    <div class="footer__middle-2">
                        <div class="row">
                            <h2 class="mb-4">{{__('frontend.offices')}}</h2>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="footer__location-2">
                                    <div class="location">
                                        <h3>{{__("frontend.address1.title")}}</h3>
                                        <p>{{__("frontend.address1.description")}}</p>
                                    </div>
                                    <div class="location">
                                        <h3>{{__("frontend.address2.title")}}</h3>
                                        <p>{{__("frontend.address2.description")}}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="footer__subscribe-2">
                                    <form action="#">
                                        <input type="text" name="email" placeholder="{{__("frontend.input.email")}}">
                                        <button type="submit" class="submit"><img src="{{asset('assets/imgs/apsf/icon/arrow-black.png')}}" alt="Arrow Icon"></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- new footer start -->
                    <div class="container">
                        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 ">
                            <div class="col mb-3">
                                <div class="footer__copyright-2">
                                    <p>{{__("frontend.copyright")}}</p>
                                </div>
                                <div class="social-media">
                                    <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/ArabPSF" target="_blank">
                                                <i class="fab fa-facebook-f fa-lg"></i>
                                            </a></li>
                                        <li><a href="https://x.com/Arab_PSF" target="_blank">
                                                {{-- <i class="fab fa-x fa-lg"></i>--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#033731" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                                </svg>
                                            </a></li>
                                        <li><a href="https://www.instagram.com/arab_psf/" target="_blank">
                                                <i class="fab fa-instagram fa-lg"></i>
                                            </a></li>
                                        <li><a href="https://www.linkedin.com/company/102934601/admin/feed/posts/" target="_blank">
                                                <i class="fab fa-linkedin-in fa-lg"></i>
                                            </a></li>
                                    </ul>
                                </div>

                            </div>

                            <div class="col mb-3">

                            </div>

                            <div class="col mb-3">
                                <h5>Quick Links</h5>
                                <br>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="{{ route('welcome') }}" class="nav-link p-0 text-body-secondary">{{__('nav.Home')}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{ route('events.index') }}" class="nav-link p-0 text-body-secondary">{{__('nav.Events')}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('livefeeds')}}" class="nav-link p-0 text-body-secondary">{{__('nav.Livefeeds')}}</a></li>
                                    <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li> -->
                                </ul>
                            </div>

                            <div class="col mb-3">
                                <h5>Resources</h5>
                                <br>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="{{route('scholarships')}}" class="nav-link p-0 text-body-secondary">{{__('nav.Scholarships')}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{ route('training-programs.list') }}" class="nav-link p-0 text-body-secondary">{{__('nav.Training Programs')}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{ route('services') }}" class="nav-link p-0 text-body-secondary">{{__('nav.Services')}}</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">{{__('nav.Faqs')}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{ route('about') }}" class="nav-link p-0 text-body-secondary">{{__('nav.About Us')}}</a></li>
                                </ul>
                            </div>

                            <div class="col mb-3">
                                <h5>Policies</h5>
                                <br>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="{{route('terms-and-conditions')}}" class="nav-link p-0 text-body-secondary">{{__("nav.terms_and_conditions")}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('privacy-policy')}}" class="nav-link p-0 text-body-secondary">{{__("nav.privacy_policy")}}</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('refund-policy')}}" class="nav-link p-0 text-body-secondary">{{__("nav.refund_policy")}}</a></li>
                                    <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li> -->
                                </ul>
                            </div>
                        </footer>
                    </div>

                    <!-- new footer end -->

                </div>
            </footer>
            <!-- Footer area end -->



        </div>

    </div>





    <script>
        function animateValue(id, start, end, duration) {
            let obj = document.getElementById(id);
            let range = end - start;
            let minTimer = 50;
            let stepTime = Math.abs(Math.floor(duration / range));
            stepTime = Math.max(stepTime, minTimer);
            let startTime = new Date().getTime();
            let endTime = startTime + duration;
            let timer;

            function run() {
                let now = new Date().getTime();
                let remaining = Math.max((endTime - now) / duration, 0);
                let value = Math.round(end - (remaining * range));
                obj.innerHTML = value;
                if (value == end) {
                    clearInterval(timer);
                }
            }

            timer = setInterval(run, stepTime);
            run();
        }

        window.addEventListener('load', function() {
            console.log('Hello world');
            animateValue("studentCount", 0, 829, 2000);
            animateValue("teacherCount", 0, 483, 2000);
            animateValue("contractorCount", 0, 620, 2000);
            animateValue("institutionCount", 0, 150, 2000);
        });
        // window.onload = function() {
        //     console.log('Hello world');
        //     animateValue("studentCount", 0, 829, 2000);
        //     animateValue("teacherCount", 0, 483, 2000);
        //     animateValue("contractorCount", 0, 620, 2000);
        //     animateValue("institutionCount", 0, 150, 2000);
        // };



        function updateDirection() {
            var ltrButton = document.querySelector('button[data-mode="ltr"]');
            var rtlButton = document.querySelector('button[data-mode="rtl"]');

            var mode = "{{App::getLocale()}}";


            if (mode === 'ar') {
                rtlButton.click();

            } else {
                ltrButton.click();

            }
        }

        window.onload = updateDirection;
        // if (mode && ltrButton.getAttribute('data-mode') === 'ltr') {
        //     ltrButton.click();
        //     console.log('ltr');
        // } else if (rtlButton && rtlButton.getAttribute('data-mode') === 'rtl') {
        //     rtlButton.click();
        //     console.log('rtl');
        // }
    </script>
    <!-- All JS files -->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/counter.js')}}"></script>
    <script src="{{asset('assets/js/gsap.min.js')}}"></script>
    <script src="{{asset('assets/js/ScrollTrigger.min.js')}}"></script>
    <script src="{{asset('assets/js/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('assets/js/ScrollSmoother.min.js')}}"></script>
    <script src="{{asset('assets/js/SplitText.min.js')}}"></script>
    <script src="{{asset('assets/js/chroma.min.js')}}"></script>
    <script src="{{asset('assets/js/mixitup.min.js')}}"></script>
    <script src="{{asset('assets/js/vanilla-tilt.js')}}"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @livewire('notifications')

</body>

</html>