<x-guest-layout>

{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <h1>pay2m Example Code For Redirection Payment Request</h1>
    <div class="container">
        <div class ="alert alert-success"> Reload page to get new token</div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    Pay2m Web Checkout - Example Code
                </div>
                <form id='pay2m_payment_form' name='pay2m-payment-form' method='post' action="https://payments.pay2m.com/Ecommerce/api/Transaction/PostTransaction" >
                    @csrf
                    <!-- ... -->
                    Currency: <input type="TEXT" name="CURRENCY_CODE" value="QAR" /><br />
                    Merchant ID: <input type="TEXT" name="MERCHANT_ID" value="{{$merchant_id}}" /><br />
                    Merchant Name: <input type="TEXT" name="MERCHANT_NAME" value="UAT Demo Merchant " /><br />
                    Token: <input type="TEXT" name="TOKEN" value="{{ $token }}" /><br />
                    Success URL: <input type="TEXT" name="SUCCESS_URL" value="{{route('payment.response')}}" /><br />
                    Failure URL: <input type="TEXT" name="FAILURE_URL" value="{{route('payment.response')}}" /><br />
                    Checkout URL: <input type="TEXT" name="CHECKOUT_URL" value="{{route('payment.response')}}" /><br />
                    Customer Email: <input type="TEXT" name="CUSTOMER_EMAIL_ADDRESS" value="some-email@example.com" /><br />
                    Customer Mobile: <input type="TEXT" name="CUSTOMER_MOBILE_NO" value="+974-34312767" /><br />
                    Transaction Amount: <input type="TEXT" name="TXNAMT" value="{{$trans_amount}}" /><br />

                    Basket ID: <input type="TEXT" name="BASKET_ID" value="{{ $basket_id}}" /><br />
                    Transaction Date: <input type="TEXT" name="ORDER_DATE" value=" {{date('Y-m-d H:i:s', time())}}" /><br />
                    Signature: <input type="TEXT" name="SIGNATURE" value="SOME-RANDOM-STRING" /><br />
                    Version: <input type="TEXT" name="VERSION" value="MERCHANT-CART-0.1" /><br />
                    Item Description: <input type="TEXT" name="TXNDESC" value="Item Purchased from Cart" /><br />
                    Proccode: <input type="TEXT" name="PROCCODE" value="00" /><br />
                    <!-- ... -->
                    <input type="SUBMIT" value="SUBMIT">
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</x-guest-layout>
