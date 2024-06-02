<x-home-layout>
{{--@php--}}
{{--//create an array of subscription plans--}}
{{--$plans = collect( [--}}
{{--     [--}}
{{--        'name' => 'المدارس',--}}
{{--        'price' => '$650',--}}
{{--        'features' => [--}}
{{--            'فرصة الاستفادة من خبرت وتجارب وممارسات الأعضاء ',--}}
{{--            'المشاركة  في اجتماعات الاتحاد والمعارض',--}}
{{--            'إمكانية الدعم الفني ',--}}
{{--            'إمكانية الدعم المالي ',--}}
{{--            'مسابقات التميز ، الأداء والكفاءة. ',--}}
{{--            'الاستفادة من مكتبة الاتحاد وغيرها من '--}}
{{--        ]--}}
{{--    ],--}}
{{--    [--}}
{{--        'name' => 'الهيئة التعليمية',--}}
{{--        'price' => '$130',--}}
{{--        'features' => [--}}
{{--            'منح دراسية جامعية',--}}
{{--            'دورات مجانية ',--}}
{{--            'دورات برسوم مخفضة ',--}}
{{--            'تخفيضات لدى بعض المؤسسات الرياضية ',--}}
{{--            'إمكانية استخدام المنصة لتقديم دورات مقابل رسوم ',--}}
{{--            'برامج   مختلفة لتأهيل المعلمين',--}}
{{--            'فرص التوظيف لدى المدارس الأعضاء'--}}
{{--        ]--}}
{{--    ],--}}
{{--    [--}}
{{--        'name' => 'الطلبة',--}}
{{--        'price' => '$26',--}}
{{--        'features' => [--}}
{{--            'منح دراسية جامعي',--}}
{{--            'منح الاتحاد المدرسية',--}}
{{--            'دورات مجانية',--}}
{{--            'دورات واشتراكات برسوم مخفضة',--}}
{{--            'تخفيضات لدى بعض المؤسسات الرياضية/الأندية/الجمعيات',--}}
{{--            'المشاركة في المسابقات العلمية والثقافية والرياضية '--}}
{{--        ]--}}
{{--    ],--}}
{{--      [--}}
{{--        'name' => 'الموردون   ',--}}
{{--        'price' => 'اتصل بنا',--}}
{{--        'features' => [--}}
{{--            'فرصة الاستفادة من التعامل مع عدد كبير من المدارس الأعضاء ',--}}
{{--            'المشاركة في معارض الاتحاد',--}}
{{--            'فرصة تسويق المنتجات عير منصة الاتحاد'--}}
{{--        ]--}}
{{--    ],--}}
{{--    [--}}
{{--        'name' => 'مقدم خدمة    ',--}}
{{--        'price' => 'اتصل بنا',--}}
{{--        'features' => [--}}
{{--            'فرصة الاستفادة من التعامل مع جمهور المنصة وتقديم الخدمات التدريبية او الاستشارية مقابل رسوم. ',--}}
{{--            'المشاركة في معارض الاتحاد ',--}}
{{--            'فرصة تسويق منتجات  عير منصة الاتحاد من منصات تعليمية '--}}
{{--        ]--}}
{{--    ],--}}


{{--]);--}}
{{-- @endphp--}}

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .container {
            max-width: 1200px;

        }

        .pricing-header {
            max-width: 900px;
        }

        #pricing-card{
            max-height: 100%;
            height: 32rem;
            background: rgba(147, 150, 155, 0.4);

            position: relative;


            margin-top: 2rem;
            border: 2px solid rgba(173, 140, 140, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 25px;
        }
        #price-button{
            background-color: #e56131;
            position: absolute;
            bottom: 0;
            left: 0px;
            color: white;
            border-color: #e56131;

        }
        .heading{
            /*color: #e56131 !important;*/
            margin: 1rem 0;
         }
        .title-wrap{
            border-color: #0c5460;
        }
        .title-inner-wrap{
            background-color: #0c5460;
            color: white;
            border-color: #0c5460;
        }
        .features{
            max-width: 20rem;
            text-align: left;
            padding-left: 1rem;
            padding-right: 1rem;
            margin: 1rem auto;
            overflow: clip;
            /*list-style: decimal outside ;*/
            color: #0c5460;
            font-weight: bold;
            font-size: 1.1rem;
            text-wrap: wrap;
            display: -webkit-box;
            -webkit-box-orient: vertical

        }
        .features li{
            /*wrap text after 3 words*/
            overflow: hidden;
            text-align: left;
            text-overflow: ellipsis;
            text-wrap: wrap;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

        }

        body[dir="rtl"] .features li {
            text-align: right;
        }
        #pricing-card{
            background:url('assets/imgs/apsf/membership/bg_member.webp') center/cover no-repeat ;
        }
        #card-body{
            height: 23rem;
            overflow: scroll;
            /*remove the scoll bar*/
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        #card-title{
            /*make it sticky*/
            /*position: sticky;*/
            /*top: 0;*/
        }
        /*change the card title background color when sticky*/
        #card-title.sticky{
            background-color: #0c5460;
        }
    </style>

    <div class="container py-3 mt-4">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">

            </div>

            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal text-body-emphasis heading">{{__('frontend.membership.heading')}}
                </h1>
                <p class="fs-5 text-body-secondary lh-base ">
                    {{__('frontend.membership.description')}}
                </p>
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

                @forelse($memberships as $membership)
                <div class="col" id="col-wrapper">
                    <div id="pricing-card" class=" title-wrap">
                        <div class="card-header py-3 title-inner-wrap">
                            <h4 class="my-0 fw-normal">{{$membership->name}}</h4>
                        </div>
                        <div id="card-body" class="card-body">
                            <div id="card-title">
                                <h1 class="card-title pricing-card-title mt-4">
                                   {{$membership->currency}} {{$membership->price}}
    {{--                                @if($plan['price'] != 'اتصل بنا')--}}
                                    <small class="text-body-secondary fw-light">{{$membership->duration}}</small>
    {{--                                @endif--}}
                                </h1>
                                @if($membership->price_note)
                                    <p>{{$membership->price_note}}</p>

                                @endif
                            </div>
                            <ul class="mt-4 mb-4 features breadcrumb">
                                @forelse($membership->benefits as $feature)

                                <li>
                                    <span>
{{--                                       bullet instead--}}
                                        &#8226;

                                    </span>
                                    {{$feature['benefit']}}
                                </li>
                                @empty
                                <li>10 users included</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                @endforelse
                            </ul>
                                <a href="{{ route('filament.admin.auth.register') }}" id="price-button" type="button" class="w-100 btn btn-lg">{{$membership->action}}</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10 users included</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button id="price-button" type="button" class="w-100 btn btn-lg btn-outline">Sign up for free</button>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
{{--            small note for users--}}
            <div class="b-example-divider"></div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-5 text-warning mt-3">{{__('frontend.membership.note')}}</p>
                </div>
            </div>

        </main>

    </div>

</x-home-layout>


