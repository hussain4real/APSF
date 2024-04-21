<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Axtra HTML5 Template">

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
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Cursor Animation -->
    <div class="cursor1"></div>
    <div class="cursor2"></div>


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
                                    <h2 class="sec-sub-title title-anim">Partnerships and International Cooperation</h2>
                                    <h3 class="sec-title title-anim">We are happy to work with global <br>
                                        renowned institutions</h3>
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

                <!-- CTA area start -->
                <section class="cta__area cta__area-7 pt-130">
                    <div class="container pb-110">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="cta__content">
                                    <p class="cta__sub-title">Work with us</p>
                                    <h2 class="cta__title title-anim">Discover the benefits of membership at Arab
                                        Private Schools
                                        Federation. Join us for collaboration, innovation, and educational excellence
                                        today</h2>
                                    <div class="btn_wrapper">
                                        <a href="contact.html"
                                            class="wc-btn-primary btn-hover btn-item"><span></span>Be A Member
                                            <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- CTA area end -->


                <!-- Blog area start -->
                <!-- <section class="blog__area-7 blog__animation">
            <div class="container g-0 pb-140">
              <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                  <div class="sec-title-wrapper">
                    <h3 class="sec-title title-anim">News & Updates</h3>
                  </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                  <article class="blog__item">
                    <div class="blog__img-wrapper">
                      <a href="blog-details.html">
                        <div class="img-box">
                          <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-1.webp" alt="">
                          <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-1.webp" alt="">
                        </div>
                      </a>
                    </div>
                    <h4 class="blog__meta"><a href="category.html">Teachers</a> . 02 May 2019</h4>
                    <h5><a href="blog-details.html" class="blog__title">Socienty of Teachers Inauguration</a></h5>
                    <a href="#" class="blog__btn">Read More <span><i
                          class="fa-solid fa-arrow-right"></i></span></a>
                  </article>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                  <article class="blog__item">
                    <div class="blog__img-wrapper">
                      <a href="blog-details.html">
                        <div class="img-box">
                          <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-2.webp" alt="">
                          <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-2.webp" alt="">
                        </div>
                      </a>
                    </div>
                    <h4 class="blog__meta"><a href="category.html">Students</a> . 02 May 2019</h4>
                    <h5><a href="blog-details.html" class="blog__title">Student Supreme Government</a></h5>
                    <a href="#" class="blog__btn">Read More <span><i
                          class="fa-solid fa-arrow-right"></i></span></a>
                  </article>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                  <article class="blog__item">
                    <div class="blog__img-wrapper">
                      <a href="blog-details.html">
                        <div class="img-box">
                          <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-3.webp" alt="Blog Thumbnail">
                          <img class="image-box__item" src="assets/imgs/apsf/news-updates/news-3.webp" alt="BLog Thumbnail">
                        </div>
                      </a>
                    </div>
                    <h4 class="blog__meta"><a href="category.html">Suppliers</a> . 02 May 2019</h4>
                    <h5><a href="blog-details.html" class="blog__title">GESS Qatar</a></h5>
                    <a href="#" class="blog__btn">Read More <span><i
                          class="fa-solid fa-arrow-right"></i></span></a>
                  </article>
                </div>
              </div>
            </div>
          </section> -->
                <!-- Blog area end -->
            </main>

            <!-- Footer area start -->
            <footer class="footer__area-2 pt-130">
                <div class="container">
                    <div class="footer__top-2 text-anim">
                        <div class="row">
                            <div class="col-xxl-12">
                                <h2 class="sec-title-3 title-anim">Be a member</h2>
                                <p class="footer__sub-title">Discover the benefits of membership at Arab Private
                                    Schools Federation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="footer__middle-2">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="footer__location-2">
                                    <div class="location">
                                        <h3>Oman</h3>
                                        <p>Muscat, Oman</p>
                                    </div>
                                    <!-- <div class="location">
                        <h3>New York</h3>
                        <p>Nenuya Centre, Elia Street <br>
                          New York, USA</p>
                      </div> -->
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="footer__subscribe-2">
                                    <form action="#">
                                        <input type="text" name="email" placeholder="Enter your email">
                                        <button type="submit" class="submit"><img
                                                src="assets/imgs/apsf/icon/arrow-black.png" alt="Arrow Icon"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer__btm-2">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5">
                                <div class="footer__copyright-2">
                                    <p>© 2024 | Alrights reserved Arab Private School Federation</p>
                                </div>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7">
                                <div class="footer__nav">
                                    <ul class="footer-menu menu-anim">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="career.html">Career</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
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
