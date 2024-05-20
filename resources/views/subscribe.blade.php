<x-home-layout>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
<div class="container mx-auto pt-24">

    <form id='pay2m_payment_form' name='pay2m-payment-form' method='post' action="https://payments.pay2m.com/Ecommerce/api/Transaction/PostTransaction" class="hidden">
{{--        @csrf--}}
        <!-- ... -->
{{--        {{route('payment.response')}}--}}
        <input type="TEXT" name="CURRENCY_CODE" value="QAR" hidden="true" readonly /><br />
        <input type="TEXT" name="MERCHANT_ID" value="{{$merchant_id}}" hidden="true" readonly /><br />
        <input type="TEXT" name="MERCHANT_NAME" value="UAT Demo Merchant " hidden="true" readonly /><br />
        <input type="TEXT" name="TOKEN" value="{{ $token }}" hidden="true" readonly /><br />
        <input type="TEXT" name="SUCCESS_URL" value="{{route('payment.response')}}" hidden="true" readonly /><br />
        <input type="TEXT" name="FAILURE_URL" value="{{route('payment.response')}}" hidden="true" readonly /><br />
        <input type="TEXT" name="CHECKOUT_URL" value="{{route('checkout')}}" hidden="true" readonly /><br />
        <input type="TEXT" name="CUSTOMER_EMAIL_ADDRESS" value="some-email@example.com" hidden="true" readonly /><br />
        <input type="TEXT" name="CUSTOMER_MOBILE_NO" value="+974-34312767" hidden="true" readonly /><br />
        <input type="TEXT" name="TXNAMT" value="{{$trans_amount}}" hidden="true" readonly /><br />

        <input type="TEXT" name="BASKET_ID" value="{{ $basket_id}}" hidden="true" readonly /><br />
        <input type="TEXT" name="ORDER_DATE" value=" {{date('Y-m-d H:i:s', time())}}" hidden="true" readonly /><br />
        <input type="TEXT" name="SIGNATURE" value="SOME-RANDOM-STRING" hidden="true" readonly /><br />
        <input type="TEXT" name="VERSION" value="MERCHANT-CART-0.1" hidden="true" readonly /><br />
        <input type="TEXT" name="TXNDESC" value="Item Purchased from Cart" hidden="true" readonly /><br />
        <input type="TEXT" name="PROCCODE" value="00" hidden="true" readonly /><br />
{{--        <input type="TEXT" name="RECURRING_TXN" value="yes" hidden="true" readonly /><br />--}}
        <!-- ... -->
    </form>






        <div class="w-full flex justify-between items-center max-w-prose py-2 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col justify-center items-center">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{$plan ?? 'Standard plan'}}</h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                <span class="text-3xl font-semibold">QAR</span>
                <span class="text-5xl font-extrabold tracking-tight">{{$trans_amount}}</span>
                <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400">/year</span>
            </div>
            <ul role="list" class="space-y-5 my-7">
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-green-700 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">2 team members</span>
                </li>
                <li class="flex">
                    <svg class="flex-shrink-0 w-4 h-4 text-green-700 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">20GB Cloud storage</span>
                </li>
                <li class="flex">
                    <svg class="flex-shrink-0 w-4 h-4 text-green-700 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Integration help</span>
                </li>
                <li class="flex line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">Sketch Files</span>
                </li>
                <li class="flex line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">API Access</span>
                </li>
                <li class="flex line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">Complete documentation</span>
                </li>
                <li class="flex line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">24×7 phone & email support</span>
                </li>
            </ul>
            <button id="form-submit" type="submit" value="submit" class="text-gray-700 bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-200 dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-700 font-medium rounded-lg text-base px-5 py-2.5 inline-flex justify-center w-full text-center">Subscribe</button>
        </div>
        <div class=" max-w-2xl mb-2">
            <img src="https://images.unsplash.com/photo-1505455184862-554165e5f6ba?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Flowbite" class="mt-8 w-full rounded" />
        </div>
    </div>


{{--    <button popovertarget="dropdown" popovertargetaction="show" class="btn btn-primary">Show me</button>--}}
{{--    <button popovertarget="dropdown" popovertargetaction="hide" class="btn btn-primary">Hide me</button>--}}
{{--    <button popovertarget="dropdown" popovertargetaction="toggle" class="btn btn-primary">Toggle me</button>--}}

{{--    <div popover id="dropdown">--}}
{{--        <div >--}}
{{--            <div >--}}
{{--                <a href="#" class="dropdown-item">Item 1</a>--}}
{{--                <a href="#" class="dropdown-item">Item 2</a>--}}
{{--                <a href="#" class="dropdown-item">Item 3</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</x-home-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('form-submit').addEventListener('click', function () {
            console.log('clicked');
            document.getElementById('pay2m_payment_form').submit();
            //log the form data
            // console.log(document.getElementById('pay2m_payment_form').submit());
        });


    });
</script>
