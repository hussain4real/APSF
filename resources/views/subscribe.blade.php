<x-home-layout>

    <style>
        /*.features{*/
        /*    max-width: 20rem;*/
        /*    text-align: left;*/
        /*    padding-left: 1rem;*/
        /*    padding-right: 1rem;*/
        /*    margin: 0 auto;*/
        /*    overflow: clip;*/
        /*    !*list-style: decimal outside ;*!*/
        /*    color: #0c5460;*/
        /*    font-weight: bold;*/
        /*    font-size: 1.1rem;*/
        /*    text-wrap: wrap;*/
        /*    display: -webkit-box;*/
        /*    -webkit-box-orient: vertical*/

        /*}*/
        /*.features li{*/
        /*    !*wrap text after 3 words*!*/
        /*    overflow: hidden;*/
        /*    text-align: left;*/
        /*    text-overflow: ellipsis;*/
        /*    text-wrap: wrap;*/
        /*    display: -webkit-box;*/
        /*    -webkit-line-clamp: 3;*/
        /*    -webkit-box-orient: vertical;*/

        /*}*/

        body[dir="rtl"] .features li {
            text-align: right;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <div class="container mx-auto">

        <form id='pay2m_payment_form' name='pay2m-payment-form' method='post' action="https://pay.pay2m.com/Ecommerce/api/Transaction/PostTransaction" class="hidden">
            {{-- @csrf--}}
            <!-- ... -->
            {{-- {{route('payment.response')}}--}}
            <input type="TEXT" name="CURRENCY_CODE" value="QAR" hidden="true" readonly /><br />
            <input type="TEXT" name="MERCHANT_ID" value="{{$merchant_id}}" hidden="true" readonly /><br />
            <input type="TEXT" name="MERCHANT_NAME" value="UAT Demo Merchant " hidden="true" readonly /><br />
            <input type="TEXT" name="TOKEN" value="{{ $token }}" hidden="true" readonly /><br />
            <input type="TEXT" name="SUCCESS_URL" value="{{route('payment.response')}}" hidden="true" readonly /><br />
            <input type="TEXT" name="FAILURE_URL" value="{{route('payment.failed')}}" hidden="true" readonly /><br />
            <input type="TEXT" name="CHECKOUT_URL" value="{{route('payment.response')}}" hidden="true" readonly /><br />
            <input type="TEXT" name="CUSTOMER_EMAIL_ADDRESS" value="some-email@example.com" hidden="true" readonly /><br />
            <input type="TEXT" name="CUSTOMER_MOBILE_NO" value="+974-34312767" hidden="true" readonly /><br />
            <input type="TEXT" name="TXNAMT" value="{{$trans_amount}}" hidden="true" readonly /><br />

            <input type="TEXT" name="BASKET_ID" value="{{ $basket_id}}" hidden="true" readonly /><br />
            <input type="TEXT" name="ORDER_DATE" value=" {{date('Y-m-d H:i:s', time())}}" hidden="true" readonly /><br />
            <input type="TEXT" name="SIGNATURE" value="SOME-RANDOM-STRING" hidden="true" readonly /><br />
            <input type="TEXT" name="VERSION" value="MERCHANT-CART-0.1" hidden="true" readonly /><br />
            <input type="TEXT" name="TXNDESC" value="Item Purchased from Cart" hidden="true" readonly /><br />
            <input type="TEXT" name="PROCCODE" value="00" hidden="true" readonly /><br />
            <input type="TEXT" name="RECURRING_TXN" value="yes" hidden="true" readonly /><br />
            <!-- ... -->
        </form>


        <main>
            <div class="container pt-5 mt-5">
                @if(session('notice'))
                <header class="pb-3 mb-4 border-bottom ">
                    <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                        {{-- speaker anouncement svg--}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-warning d-flex align-items-center justify-content-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div class="fs-4 ">{{session('notice')}}</div>
                        </div>
                    </a>
                </header>
                @endif

                <div class="mb-4 bg-body-tertiary rounded-3">
                    <div class="row">
                        <div class="py-4 px-5 col">

                            {{-- @dd($userProfileType) --}}
                            {{-- @dd($membershipData) --}}
                            @foreach($membershipData as $membership)
                            <h1 class="display-5 fw-bold mb-4">{{$membership['name']}}</h1>
                            @if ($membership['price'])
                            <h4 class="fs-5 text-muted">USD {{$membership['price'] }}</h4>
                            @endif

                            <ul class="mt-4 mb-4 features breadcrumb">
                                @foreach($membership['benefits'] as $benefit)
                                <li>
                                    <span>
                                    
                                        &#8226;

                                    </span>
                                    {{$benefit['benefit']}}
                                </li>

                                @endforeach
                            </ul>
                            @endforeach

                            <button class="btn btn-primary btn-lg" id="form-submit" type="submit" value="submit">Pay
                            </button>
                        </div>
                        <div class="col">
                            <img src="https://images.unsplash.com/photo-1505455184862-554165e5f6ba?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Flowbite" class="img-fluid" />
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>


    <style>
        #pay2m_payment_form {
            display: none;
        }

        main {
            margin-top: 2rem;
        }

        #form-submit {
            background: #e56131;
            border-color: #e56131;
            margin-top: 4rem;
        }

        .img-fluid {
            border-top-right-radius: 2rem;
            border-bottom-right-radius: 2rem;
            height: 100%;
        }

        .fa-bullhorn {
            font-size: 2rem;
        }
    </style>
</x-home-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('form-submit').addEventListener('click', function() {
            console.log('clicked');
            document.getElementById('pay2m_payment_form').submit();
            //log the form data
            // console.log(document.getElementById('pay2m_payment_form').submit());
        });


    });
</script>