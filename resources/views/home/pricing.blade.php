<x-home-layout>
@php
//create an array of subscription plans
$plans = collect( [
     [
        'name' => 'المدارس',
        'price' => '$650',
        'features' => [
            'فرصة الاستفادة من خبرت وتجارب وممارسات الأعضاء ',
            'المشاركة  في اجتماعات الاتحاد والمعارض',
            'إمكانية الدعم الفني ',
            'إمكانية الدعم المالي ',
            'مسابقات التميز ، الأداء والكفاءة. ',
            'الاستفادة من مكتبة الاتحاد وغيرها من '
        ]
    ],
    [
        'name' => 'الهيئة التعليمية',
        'price' => '$130',
        'features' => [
            'منح دراسية جامعية',
            'دورات مجانية ',
            'دورات برسوم مخفضة ',
            'تخفيضات لدى بعض المؤسسات الرياضية ',
            'إمكانية استخدام المنصة لتقديم دورات مقابل رسوم ',
            'برامج   مختلفة لتأهيل المعلمين',
            'فرص التوظيف لدى المدارس الأعضاء'
        ]
    ],
    [
        'name' => 'الطلبة',
        'price' => '$26',
        'features' => [
            'منح دراسية جامعي',
            'منح الاتحاد المدرسية',
            'دورات مجانية',
            'دورات واشتراكات برسوم مخفضة',
            'تخفيضات لدى بعض المؤسسات الرياضية/الأندية/الجمعيات',
            'المشاركة في المسابقات العلمية والثقافية والرياضية '
        ]
    ],
      [
        'name' => 'الموردون   ',
        'price' => 'اتصل بنا',
        'features' => [
            'فرصة الاستفادة من التعامل مع عدد كبير من المدارس الأعضاء ',
            'المشاركة في معارض الاتحاد',
            'فرصة تسويق المنتجات عير منصة الاتحاد'
        ]
    ],
    [
        'name' => 'مقدم خدمة    ',
        'price' => 'اتصل بنا',
        'features' => [
            'فرصة الاستفادة من التعامل مع جمهور المنصة وتقديم الخدمات التدريبية او الاستشارية مقابل رسوم. ',
            'المشاركة في معارض الاتحاد ',
            'فرصة تسويق منتجات  عير منصة الاتحاد من منصات تعليمية '
        ]
    ],


]);
 @endphp

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
            color: #e56131 !important;
            margin: 1rem auto;
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
            text-align: right;
            text-overflow: ellipsis;
            text-wrap: wrap;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

        }
    </style>

    <div class="container py-3 mt-4">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">

            </div>

            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal text-body-emphasis heading">العضوية ومزايا الاشتراك
                </h1>
                <p class="fs-5 text-body-secondary lh-base ">
{{--                    generate a good description for the pricing and features for arab federation--}}
                    انضموا الينا للاستفادة من المزايا الحالية لباقات العضوية علما" بأننا نعمل على تعزيز باقات المزايا بشكل مستمر من اجل خدمة قطاع مدارس القطاع الخاص في الوطن العربي
                </p>
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

                @forelse($plans as $plan)
                <div class="col" >
                    <div id="pricing-card" class="card mb-4 rounded-3 shadow-sm title-wrap">
                        <div class="card-header py-3 title-inner-wrap">
                            <h4 class="my-0 fw-normal">{{$plan['name']}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title mt-4">
                                {{$plan['price']}}
                                @if($plan['price'] != 'اتصل بنا')
                                <small class="text-body-secondary fw-light">/سنويا</small>
                                @endif
                            </h1>
                            @if($plan['name'] == 'الطلبة' || $plan['name']=='الهيئة التعليمية')
                                <p>مجانا في السنة الأولى للمدارس المشتركة
                                </p>
                            @endif
                            <ul class="mt-4 mb-4 features breadcrumb">
                                @forelse($plan['features'] as $feature)

                                <li>
                                    <span>
{{--                                       bullet instead--}}
                                        &#8226;

                                    </span>
                                    {{$feature}}
                                </li>
                                @empty
                                <li>10 users included</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                @endforelse
                            </ul>
                            @if($plan['name'] == 'الطلبة' || $plan['name']=='الهيئة التعليمية')
                                <a href="{{ route('filament.admin.auth.register') }}" id="price-button" type="button" class="w-100 btn btn-lg">سجل مجانًا</a>
                            @else
                            <a href="{{ route('filament.admin.auth.register') }}" id="price-button" type="button" class="w-100 btn btn-lg">ابدأ الآن</a>
                                @endif
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
                    <p class="text-center fs-5 text-warning mt-3">* ملاحظة: - تخضع الفوائد والمزايا لمجموعة من الشروط والاحكام وحسب طبيعة الخدمة المقدمة.</p>
                </div>
            </div>

        </main>

    </div>


{{--    <div class="containerr">--}}
{{--        <div class="grid">--}}
{{--            <div class="card">--}}
{{--                <h2 class="card_title">Students</h2>--}}
{{--                <p class="pricing">OMR 25<span class="small">/year</span></p>--}}
{{--                <p>Save $9</p>--}}
{{--                <hr>--}}
{{--                <ul class="features">--}}
{{--                    <li>One account</li>--}}
{{--                    <li>Unlimited songs</li>--}}
{{--                    <li>Customized playlist</li>--}}
{{--                </ul>--}}
{{--                <a href="#" class="cta_btn">Subscribe</a>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <h2 class="card_title">Teachers</h2>--}}
{{--                <p class="pricing">OMR 50<span class="small">/year</span></p>--}}
{{--                --}}{{--                <p>Save $9</p>--}}
{{--                <hr>--}}
{{--                <ul class="features">--}}
{{--                    <li>One account</li>--}}
{{--                    <li>Unlimited songs</li>--}}
{{--                    <li>Customized playlist</li>--}}
{{--                </ul>--}}
{{--                <a href="#" class="cta_btn">Subscribe</a>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <h2 class="card_title">Members</h2>--}}
{{--                <p class="pricing">OMR 250<span class="small">/year</span></p>--}}
{{--                <p>Save $15</p>--}}
{{--                <hr>--}}
{{--                <ul class="features">--}}
{{--                    <li>One account</li>--}}
{{--                    <li>Unlimited songs</li>--}}
{{--                    <li>Customized playlist</li>--}}
{{--                </ul>--}}
{{--                <a href="#" class="cta_btn">Subscribe</a>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <h2 class="card_title">Founders</h2>--}}
{{--                <p class="pricing">OMR 500<span class="small">/year</span></p>--}}
{{--                <p>Save $25</p>--}}
{{--                <hr>--}}
{{--                <ul class="features">--}}
{{--                    <li>Six account</li>--}}
{{--                    <li>Unlimited songs</li>--}}
{{--                    <li>Customized playlist</li>--}}
{{--                </ul>--}}
{{--                <a href="#" class="cta_btn">Subscribe</a>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <h2 class="card_title">Contractors/Consultants</h2>--}}
{{--                <p class="pricing">OMR 700<span class="small">/year</span></p>--}}
{{--                --}}{{--                <p>Save $9</p>--}}
{{--                <hr>--}}
{{--                <ul class="features">--}}
{{--                    <li>One account</li>--}}
{{--                    <li>Unlimited songs</li>--}}
{{--                    <li>Customized playlist</li>--}}
{{--                </ul>--}}
{{--                <a href="#" class="cta_btn">Subscribe</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <a href="https://youtu.be/RLReK22LWTo" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>--}}
</x-home-layout>
{{--<style>--}}
{{--    /** {*/--}}
{{--    /*    margin: 0;*/--}}
{{--    /*    padding: 0;*/--}}
{{--    /*    box-sizing: border-box;*/--}}
{{--    /*}*/--}}

{{--    /*body {*/--}}
{{--    /*    min-height: 100vh;*/--}}
{{--    /*    background: url("https://images.unsplash.com/photo-1598125443421-779f98323fe4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");*/--}}
{{--    /*    background-repeat: no-repeat;*/--}}
{{--    /*    background-size: cover;*/--}}
{{--    /*    color: white;*/--}}
{{--    /*    font-family: Roboto;*/--}}
{{--    /*    font-size: 16px;*/--}}
{{--    /*}*/--}}

{{--    .containerr {--}}
{{--        background: url("https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");--}}
{{--        background-repeat: no-repeat;--}}
{{--        background-size: cover;--}}
{{--        background-position: center;--}}
{{--        min-height: 100vh;--}}
{{--        /*background: url("https://images.unsplash.com/photo-1598125443421-779f98323fe4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");*/--}}
{{--        /*background-repeat: no-repeat;*/--}}
{{--        /*background-size: contain;*/--}}
{{--        color: white;--}}
{{--        font-size: 16px;--}}
{{--        max-width: 100%;--}}
{{--        max-height: 100%;--}}
{{--        margin: 0rem;--}}
{{--        /*padding: 0 2rem;*/--}}
{{--        /*height: 100%;*/--}}
{{--    }--}}

{{--    .grid {--}}
{{--        /*background: rgba(147, 150, 155, 0.7);*/--}}
{{--        /*border-radius: 2rem;*/--}}
{{--        color: white;--}}
{{--        padding:1rem 2rem;--}}
{{--        display: grid;--}}
{{--        justify-content: center;--}}
{{--        align-items: center;--}}
{{--        grid-template-columns: 1fr 1fr 1fr;--}}
{{--        gap: 4%;--}}
{{--    }--}}

{{--    .card {--}}
{{--        background: rgba(147, 150, 155, 0.4);--}}
{{--        display: flex;--}}
{{--        flex-direction: column;--}}
{{--        align-items: center;--}}
{{--        justify-content: space-between;--}}
{{--        padding: 0.5rem 1rem;--}}
{{--        margin-top: 2rem;--}}
{{--        max-height: 100%;--}}
{{--        height: 32rem;--}}
{{--        /*background: rgba(255, 255, 255, 0.1);*/--}}
{{--        border: 2px solid rgba(173, 140, 140, 0.2);--}}
{{--        backdrop-filter: blur(10px);--}}
{{--        border-radius: 25px;--}}
{{--    }--}}

{{--    .card_title {--}}
{{--        font-weight: normal;--}}
{{--        color: white;--}}
{{--        font-size: 36px;--}}
{{--        margin-bottom: 0;--}}
{{--    }--}}

{{--    .pricing {--}}
{{--        font-weight: normal;--}}
{{--        font-size: 96px;--}}
{{--        color: antiquewhite;--}}
{{--    }--}}

{{--    .pricing .small {--}}
{{--        font-size: 1.5rem;--}}
{{--        color: white;--}}
{{--    }--}}

{{--    hr {--}}
{{--        margin-top: 0px;--}}
{{--    }--}}

{{--    .features {--}}
{{--        margin:0;--}}
{{--        font-size:1rem;--}}
{{--        list-style-position: inside;--}}
{{--    }--}}

{{--    .features li {--}}
{{--        padding-bottom: 0;--}}
{{--    }--}}

{{--    a.cta_btn {--}}
{{--        width: 100%;--}}
{{--        display: inline-block;--}}
{{--        text-align: center;--}}
{{--        background: rgba(228, 98, 44, 0.7);--}}
{{--        border-radius: 29px;--}}
{{--        padding: 1rem 0;--}}
{{--        color: white;--}}
{{--        text-decoration: none;--}}
{{--        letter-spacing: 2px;--}}
{{--        transition: background .3s ease;--}}
{{--    }--}}

{{--    a.cta_btn:hover {--}}
{{--        background: rgba(228, 98, 44, 1);--}}
{{--    }--}}
{{--    /*.link {*/--}}
{{--    /*    position: fixed;*/--}}
{{--    /*    background-color: #D12322;*/--}}
{{--    /*    padding: 23px 40px;*/--}}
{{--    /*    right: -99px;*/--}}
{{--    /*    border-radius: 5px;*/--}}
{{--    /*    top: 50%;*/--}}
{{--    /*    transform: translateY(-50%);*/--}}
{{--    /*    transform: rotate(-90deg);*/--}}
{{--    /*    font-size: 18px;*/--}}
{{--    /*    font-weight: 500;*/--}}
{{--    /*    color: #FFF;*/--}}
{{--    /*    text-decoration: none;*/--}}
{{--    /*    text-transform: capitalize;*/--}}
{{--    /*    transition: all .1s ease-in-out;*/--}}
{{--    /*}*/--}}

{{--    /*.link i {*/--}}
{{--    /*    padding-left: 7px;*/--}}
{{--    /*}*/--}}

{{--    /*.link:hover {*/--}}
{{--    /*    text-decoration: underline;*/--}}
{{--    /*    background-color: black;*/--}}
{{--    /*}*/--}}
{{--    @media only screen and (max-width: 1024px) {--}}
{{--        .grid {--}}
{{--            grid-template-columns: 1fr 1fr;--}}
{{--            gap: 2%;--}}

{{--        }--}}
{{--    }--}}

{{--    @media only screen and (max-width: 425px) {--}}
{{--        .grid {--}}
{{--            grid-template-columns: 1fr;--}}
{{--            gap: 2%;--}}
{{--            padding-bottom: 25%;--}}
{{--        }--}}

{{--        .container {--}}
{{--            padding: 0 1rem;--}}
{{--        }--}}


{{--        .card {--}}
{{--            padding: 30px;--}}
{{--        }--}}

{{--        .card_title {--}}
{{--            font-size: 24px;--}}
{{--            margin-bottom: 12px;--}}
{{--        }--}}

{{--        .pricing {--}}
{{--            font-size: 52px;--}}
{{--        }--}}

{{--        hr {--}}
{{--            margin-top: 50px;--}}
{{--        }--}}

{{--        a.cta_btn {--}}
{{--            font-size: 1rem;--}}
{{--        }--}}
{{--    }--}}
{{--</style>--}}
