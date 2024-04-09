<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Axtra HTML5 Template">

    <title>Home - Arab Private Schools Federation</title>

    <!-- Fav Icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/imgs/apsf/logo/apsf_favicon.png')}}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- All CSS files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/progressbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/master.css')}}">
    <link rel="stylesheet" href="style.css">
    {{-- @vite('resources/css/app.css') --}}
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
    <header class="header__area-7">
      <div class="header__inner-2">
        <div class="header__logo-2">
          <a href="home.html" class="logo-dark"><img src="assets/imgs/apsf/logo/apsflogo_271x69.webp" alt="Site Logo"></a>
          <a href="home.html" class="logo-light"><img src="assets/imgs/logo/site-logo-white-2.png" alt="Site Logo"></a>
        </div>
        <div class="header__nav-2">
          <ul class="main-menu-4 menu-anim">
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="#">Committee</a>
              <ul class="main-dropdown">
                <li><a href="founders.html">Founders Committee</a></li>
                <li><a href="board-of-trustees.html">Board of Trustees</a></li>
                <li><a href="general-secretariat.html">General Secretariat</a></li>
              </ul>
            </li>
            <li><a href="service.html">Services</a>
              <!-- <ul class="main-dropdown">
                <li><a href="#">Academic Support</a></li>
                <li><a href="#">Professional Development</a></li>
                <li><a href="#">Student Support</a></li>
                <li><a href="#">Advocacy & Representation</a></li>
                <li><a href="#">Programs & Initiatives</a></li>
                <li><a href="#">Membership</a></li>
              </ul> -->
            </li>
            <li><a href="events.html">Events</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><i class="fa-solid fa-user"></i> Login</li>
          </ul>
        </div>

        <div class="header__nav-icon-7">

          <button class="menu-icon-2" id="open_offcanvas"><img src="assets/imgs/apsf/icon/menu-dark.png"
              alt="Menubar Icon"></button>
        </div>
      </div>
    </header>
    <!-- Header area end -->


    <!-- Offcanvas area start -->
    <div class="offcanvas__area">
      <div class="offcanvas__body">
        <div class="offcanvas__left">
          <div class="offcanvas__logo">
            <a href="home.html"><img src="assets/imgs/apsf/logo/apsflogo_271x69_white.webp" alt="Offcanvas Logo"></a>
          </div>
          <div class="offcanvas__social">
            <h3 class="social-title">Follow Us</h3>
            <ul>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">YouTube</a></li>
              <li><a href="#">LinkedIn</a></li>
            </ul>
          </div>
          <div class="offcanvas__links">
            <ul>
              <li><a href="about.html">About APSF</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="career.html">Career</a></li>
              <li><a href="faq.html">FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="offcanvas__mid">
          <div class="offcanvas__menu-wrapper">
            <nav class="offcanvas__menu">
              <ul class="menu-anim">
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a>Committee</a>
                  <ul>
                    <li><a href="founders.html">Founders Committee</a></li>
                    <li><a href="board-of-trustees.html">Board of Trustees</a></li>
                    <li><a href="general-secretariat.html">General Secretariat</a></li>
                  </ul>
                </li>
                <li><a href="service.html">Services</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="offcanvas__right">
          <div class="offcanvas__search">
            <form action="#">
              <input type="text" name="search" placeholder="Search keyword">
              <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
          <div class="offcanvas__contact">
            <h3>Get in touch</h3>
            <ul>
              <li><a href="#">+(974) - 123 456 7891</a></li>
              <li><a href="#">info@arab-pfs.com</a></li>
              <li>Doha Qatar</li>
            </ul>
          </div>
          <img src="assets/imgs/shape/11.png" alt="shape" class="shape-1">
          <img src="assets/imgs/shape/12.png" alt="shape" class="shape-2">
        </div>
        <div class="offcanvas__close">
          <button type="button" id="close_offcanvas"><i class="fa-solid fa-xmark"></i></button>
        </div>
      </div>
    </div>
    <!-- Offcanvas area end -->


    <div id="smooth-wrapper">
      <div id="smooth-content">
        <main>

          <!-- Hero area start -->
          <section class="service__hero-2">
            <div class="container">
              <div class="row">
                <div class="col-xxl-12">
                  <div class="service__hero-inner-2">
                    <div class="service__hero-left-2">
                      <img src="assets/imgs/apsf/home-header/home-435x472.webp" alt="Image" class="image-1">
                      <img src="assets/imgs/apsf/home-header/home-240x240.webp" alt="Image" class="image-2">
                      <!-- <img src="assets/imgs/apsf/header-area/student.webp" alt="Image" class="image-3"> -->
                      <img src="assets/imgs/apsf/home-header/home-300x450.webp" alt="Image" class="image-4">
                    </div>
                    <div class="service__hero-right-2 hero7__thum-anim">
                      <h2 class="title creative">Excellence in Education  </h2>
                      <p class="animate_content">Educating minds, inspiring hearts, fostering excellence — shaping tomorrow's leaders with passion, purpose, and unparalleled dedication to learning. <br><br>Empower students to thrive academically, socially, and emotionally. It prioritizes innovation, inclusivity, and personalized support, fostering critical thinking and lifelong learning skills essential for success in a rapidly evolving world.</p>
                      <img src="assets/imgs/home-7/scroll.png" alt="scroll Image" class="scroll">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <img src="assets/imgs/home-7/shape-6.png" alt="Shape Image" class="shape-1">
          </section>
          <!-- Hero area end -->


          <!-- <div class="video__area about__img-2">
            <img src="assets/imgs/apsf/body-area/home-image-01.webp" alt="Video Image" data-speed="0.2">
          </div> -->


  <!-- About area start -->
  <section class="about__area-7">
    <div class="container pt-130 pb-110">
      <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="about__left-7">
            <!-- <img src="assets/imgs/apsf/body-area/home-image-04.webp" alt="Image" data-speed="auto"> -->
            <img src="assets/imgs/apsf/mission-vision/mission-vision.webp" alt="Image" data-speed="auto">
          </div>
        </div>
        <div class="col-xxl-8 col-xl-5 col-lg-5 col-md-5">
          <div class="text-anim objectives-inner">
            <h2 class="sec-title title-anim">Mission</h2>
            <p class="body-text-common"><br>To foster excellence in education by providing a platform for collaboration, innovation, and continuous improvement among private schools in the Arab region. We strive to promote educational leadership, enhance learning outcomes, and empower educators to meet the diverse needs of students, preparing them for success in a globalized world.</p>
            <h2 class="sec-title title-anim">Vision</h2>
            <p class="body-text-common"><br>Our vision is to become the leading force in transforming private education in the Arab region, recognized for our commitment to excellence, innovation, and inclusivity. We aspire to create a dynamic educational ecosystem that empowers every student to reach their full potential and contribute positively to society.</p>
            <!-- <img src="assets/imgs/home-7/shape-5.png" alt="Shape" class="signature"> -->
            <!-- <img src="assets/imgs/apsf/body-area/home-image-02.webp" alt="Image" class="image-1"> -->
          </div>
        </div>
        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
          <div class="about__right-7">
            <img src="assets/imgs/apsf/body-area/home-image-03.webp" alt="Image" data-speed="0.7">
          </div>
        </div> -->
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
                    <h2 class="sec-title title-anim">Our Values</h2>
                    <!-- <p class="sec-text">Comprehensive solutions tailored to meet diverse needs with precision.</p> -->
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
                      <h3 class="service__title-7">Excellence</h3>
                        <p> Striving for the highest standards of academic, professional, and operational excellence in all endeavors.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/collaboration.webp" alt="">
                        <h3 class="service__title-7">Collaboration</h3>
                      <p>Fostering strong partnerships and collaboration among member schools, educators, and stakeholders to achieve common goals.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/innovation.webp" alt="">
                        <h3 class="service__title-7">Innovation</h3>
                      <p>Embracing innovation and creativity in education, leveraging technology, and adopting best practices to enhance learning outcomes.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/inclusivity.webp" alt="">
                        <h3 class="service__title-7">Inclusivity</h3>
                      <p>Promoting diversity, equity, and inclusivity in education, ensuring access and support for all students regardless of background or ability.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/continuousimprovement.webp" alt="">
                        <h3 class="service__title-7">Continuous<br> Improvement</span></h3>
                      <p>Committing to continuous learning, reflection, and improvement to adapt to evolving educational needs and challenges.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/studentcenterdness.webp" alt="">
                        <h3 class="service__title-7">Student-Centeredness</h3>
                      <p>Putting students at the center of all educational initiatives, prioritizing their holistic development, well-being, and success.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/globalcitizenship.webp" alt="">
                      <h3 class="service__title-7">Global Citizenship</h3>
                      <p>Putting students at the center of all educational initiatives, prioritizing their holistic development, well-being, and success.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/leadership.webp" alt="">
                        <h3 class="service__title-7">Leadership</h3>
                      <p>Nurturing educational leadership at all levels, empowering educators and administrators to lead with vision, empathy, and effectiveness.</p>
                    </div>
                    <div class="service__item-7">
                      <img src="assets/imgs/apsf/values-icons/communityengagement.webp" alt="">
                        <h3 class="service__title-7">Community Engagement</h3>
                      <p>Engaging actively with the community, parents, and stakeholders to build strong partnerships and enhance the educational experience for students.</p>
                    </div>
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
                    <h2 class="sec-title title-anim">Chairman's Message</h2>
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

              <div class="row g-0">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                  <div class="testimonial__video">
                    <img src="assets/imgs/apsf/chairman-message/chairman.webp" alt="Brand Logo">
                  </div>
                </div>

                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                  <div class="testimonial__slider-wrapper-2">
                    <div class="swiper testimonial__slider">
                      <div class="swiper-wrapper">

                        <div class="swiper-slide testimonial__slide">
                          <div class="testimonial__inner-2">
                            <!-- <h2 class="testimonial__title-2">Amazing digital service</h2> -->
                            <p class="testimonial__text-2">I am delighted to extend my warm greetings and appreciation to each of you, including the esteemed members of the administrative and teaching staff, as well as all the students and individuals associated with this prestigious institution. <br><br>I am honored to have the opportunity to be the chairman founder of the first of its kind the "Arab Federation of Private Schools." This federation is built upon strong foundations and principles aimed at fostering cultural and historical connections among schools.<br><br> It promotes excellence educations and recognizes and award talents.  It celebrates the unique Arab identity, encompassing language, literature, and cultural heritage that unites our Arab communities.</p>
                          </div>
                        </div>

                        <div class="swiper-slide testimonial__slide">
                          <div class="testimonial__inner-2">
                            <p class="testimonial__text-2">It promotes religious values and ethical principles that unite our students and reinforce their moral character. The federation serves as a platform for sharing experiences, launching initiatives, and implementing educational programs, while also fostering healthy competition in academic, athletic, and cultural events. The Arabic language, as a primary means of communication, plays a vital role in connecting our schools and students. <br><br>We believe that the Arab Federation of Private Schools will serve as a catalyst for enhancing camaraderie and collaboration among Arab private schools. By pooling our resources and expertise, we can elevate the quality of education and enhance the learning experiences of our students. <br><br>This federation will serve as a robust platform for training, professional development, and career opportunities aligned with current and future educational trends. In addition will continue to promote alternative pathways for our students to advance in their education journey. </p>
                            <h3 class="testimonial__author">Dr. Khamis Al Ajmi</h3>
                            <h4 class="testimonial__role">Chairman, Arab Private Schools Federation</h4>
                          </div>
                        </div>

                        <!--
                        <div class="swiper-slide testimonial__slide">
                          <div class="testimonial__inner-2">
                            <h2 class="testimonial__title-2">Amazing digital service</h2>
                            <p class="testimonial__text-2">We were there right at the beginning just when the concept
                              for
                              search
                              engine optimisation taking office and the full of internet. So wewe’ve grown to employ
                              than 50
                              talented specialists with diverse experiences and broad skill sets of huge markers.</p>
                            <h3 class="testimonial__author">Adam Syndera</h3>
                            <h4 class="testimonial__role">CEO, Agency</h4>
                          </div>
                        </div> -->

                      </div>
                    </div>

                    <div class="testimonial__pagination">
                      <div class="prev-button"><i class="fa-solid fa-arrow-right"></i></div>
                      <div class="next-button"><i class="fa-solid fa-arrow-left"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Testimonial area end -->

          <!-- Award area start -->
          <!-- <section class="award__area-7">
            <div class="container">
              <div class="row inherit_row">
                <div class="col-xxl-12">
                  <div class="award__top-7">
                    <div class="award__counter fade_bottom_2">
                      <h2 class="counter__number">25k</h2>
                      <p>Project completed</p>
                    </div>
                    <div class="award-video-7">
                      <video loop muted autoplay playsinline>
                        <source src="assets/video/chairman-speech.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
              </div>

              <div class="award__btm-7">
                <div class="row">
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                    <div class="award__left-7">
                      <h2 class="sec-title title-anim">Projects <br> awards</h2>
                    </div>
                  </div>
                  <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-8">
                    <div class="award__mid-7 text-anim">
                      <p>Holisticly actualize magnetic testing procedures for high-quality initiatives for ompellingly
                        enhance users whereas.</p>
                    </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="award__right-7">
                      <div class="award__list-7">
                        <div class="award__item-7 zoom_in">
                          <img src="assets/imgs/home-7/m.png" alt="Image">
                          <h3 class="title">1x Mobile Award</h3>
                        </div>
                        <div class="award__item-7 zoom_in">
                          <img src="assets/imgs/home-7/w.png" alt="Image">
                          <h3 class="title">2x Best Website</h3>
                        </div>
                        <div class="award__item-7 zoom_in">
                          <img src="assets/imgs/home-7/fwa.png" alt="Image">
                          <h3 class="title">2x Web the Day</h3>
                        </div>
                        <div class="award__item-7 zoom_in">
                          <img src="assets/imgs/home-7/webby.png" alt="Image">
                          <h3 class="title">3x Web Animation</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section> -->
          <!-- Award area end -->


          <!-- Portfolio area start -->
          <!-- <section class="portfolio__area-7">
            <div class="container pt-140 pb-100">
              <div class="row">
                <div class="col-xxl-12">
                  <div class="sec-title-wrapper text-anim">
                    <h2 class="sec-title title-anim">work</h2>
                    <p class="sec-text">Worked with global brands & agency at the
                      intersection of flat design and digital
                      technology.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper portfolio__slider-7">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="portfolio__slide-7">
                    <div class="slide-img">
                      <a href="portfolio-details.html"><img src="assets/imgs/apsf/works/work-1.webp" alt="Portfolio Image"></a>
                    </div>
                    <div class="slide-content">
                      <a href="portfolio-details.html">
                        <h2 class="title"> Oman Library </h2>
                      </a>
                      <h4 class="date">02 May 2021</h4>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="portfolio__slide-7">
                    <div class="slide-img">
                      <a href="portfolio-details.html"><img src="assets/imgs/apsf/works/work-2.webp" alt="Portfolio Image"></a>
                    </div>
                    <div class="slide-content">
                      <a href="portfolio-details.html">
                        <h2 class="title"> SPED School </h2>
                      </a>
                      <h4 class="date">02 May 2021</h4>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="portfolio__slide-7">
                    <div class="slide-img">
                      <a href="portfolio-details.html"><img src="assets/imgs/apsf/works/work-3.webp" alt="Portfolio Image"></a>
                    </div>
                    <div class="slide-content">
                      <a href="portfolio-details.html">
                        <h2 class="title"> University of London </h2>
                      </a>
                      <h4 class="date">02 May 2021</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section> -->
          <!-- Portfolio area end -->





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
                    <h2 class="cta__title title-anim">Discover the benefits of membership at Arab Private Schools Federation. Join us for collaboration, innovation, and educational excellence today</h2>
                    <div class="btn_wrapper">
                      <a href="contact.html" class="wc-btn-primary btn-hover btn-item"><span></span>Be A Member <i
                          class="fa-solid fa-arrow-right"></i></a>
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


  </body>

</html>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        const alertTrigger = document.getElementById('liveAlertBtn')
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                appendAlert('Nice, you triggered this alert message!', 'success')
            })
        }
    })
</script>

