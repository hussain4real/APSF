@php
use App\Models\TrainingProgram;
use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
//dd($record);
$trainingProgram = TrainingProgram::find($record);
$merchant_id = config('services.pay2m.merchant_id');
$secured_key = config('services.pay2m.secured_key');
$initialprice = auth()->user() ? $trainingProgram->member_price : $trainingProgram->regular_price;

//convert price from USD to QAR
$trans_amount = $initialprice * 3.64;
$basket_id = auth()->user() ? auth()->user()->id . '-' . $trainingProgram->id . '-' . $trainingProgram->title : $trainingProgram->id . '-guest' . '-' . $trainingProgram->title;
//dd($basket_id);
 //dd($trans_amount);
$pay2m = new Pay2mConnector();
$tokenRequest = new GetAccessTokenRequest(
$merchant_id,
$secured_key,
$trans_amount,
$basket_id
);
try {
$response = $pay2m->send($tokenRequest);
$status = $response->status();
$body = $response->object();
 //dd($status, $body);
$token = isset($body->ACCESS_TOKEN) ? $body->ACCESS_TOKEN : '';
// dd($token);


} catch (\Exception $e) {
return redirect()->back()->with('error', $e->getMessage());
}


@endphp
<style>
    h1 {
        margin: 0;
    }

    .fi-modal-window {
        /* margin-top: 20rem !important; */
    }

    p {
        margin: 0;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-weight: 500;
    }

    .pricing-card {
        width: 700px;
        font-family: 'Puppins', sans-serif;
        display: flex;
        margin: 5rem auto;
        border-radius: 2rem;
        box-shadow: 10px 10px 10px 0 rgba(2, 24, 6, 0.5);
    }

    .card-left {
        text-align: center;
        background: linear-gradient(65deg, #033733, #dc2430);
        color: #fff;
        width: 30%;
        padding: 85px 20px;
        border-radius: 6px 0 0 6px;
    }

    .card-left h1 {
        text-transform: uppercase;
        margin-bottom: 1rem;
        font-size: 24px;
    }

    .card-left p {
        font-size: 60px;
        margin: 2rem 0;
    }

    .dollar {
        font-size: 24px;
        position: relative;
        top: -26px;
    }

    .card-right {
        text-align: left;
        background: #fff;
        width: 70%;
        color: $red;
        border-radius: 0 6px 6px 0;
        padding: 40px 40px;
    }

    .card-right h1 {
        margin-bottom: 15px;
        color: #292e31;
        opacity: 0.9;
    }

    .card-right ul {
        margin-bottom: 40px;
    }

    .card-right li {
        padding-bottom: 6px;
    }

    .button {
        text-decoration: none;
        color: #fff;
        background: #e56131;
        padding: 20px 80px;
        border-radius: 100px;
        transition: all 500ms ease;
    }

    .button:hover {
        background: purple;
    }
</style>

<form id='pay2m_payment_form' name='pay2m-payment-form' method='post' action="https://pay.pay2m.com/Ecommerce/api/Transaction/PostTransaction" hidden="true">
    {{-- @csrf--}}
    <!-- ... -->
    {{-- {{route('payment.response')}}--}}
    <input type="TEXT" name="CURRENCY_CODE" value="QAR" hidden="true" readonly /><br />
    <input type="TEXT" name="MERCHANT_ID" value="{{$merchant_id}}" hidden="true" readonly /><br />
    <input type="TEXT" name="MERCHANT_NAME" value="UAT Demo Merchant " hidden="true" readonly /><br />
    <input type="TEXT" name="TOKEN" value="{{ $token }}" hidden="true" readonly /><br />
    <input type="TEXT" name="SUCCESS_URL" value="{{route('payment.success')}}" hidden="true" readonly /><br />
    <input type="TEXT" name="FAILURE_URL" value="{{route('course.failed')}}" hidden="true" readonly /><br />
    <input type="TEXT" name="CHECKOUT_URL" value="{{route('api.payment.response')}}" hidden="true" readonly /><br />
    <input type="TEXT" name="CUSTOMER_EMAIL_ADDRESS" value="some-email@example.com" hidden="true" readonly /><br />
    <input type="TEXT" name="CUSTOMER_MOBILE_NO" value="+974-34312767" hidden="true" readonly /><br />
    <input type="TEXT" name="TXNAMT" value="{{$trans_amount}}" hidden="true" readonly /><br />

    <input type="TEXT" name="BASKET_ID" value="{{ $basket_id}}" hidden="true" readonly /><br />
    <input type="TEXT" name="ORDER_DATE" value=" {{date('Y-m-d H:i:s', time())}}" hidden="true" readonly /><br />
    <input type="TEXT" name="SIGNATURE" value="SOME-RANDOM-STRING" hidden="true" readonly /><br />
    <input type="TEXT" name="VERSION" value="MERCHANT-CART-0.1" hidden="true" readonly /><br />
    <input type="TEXT" name="TXNDESC" value="Item Purchased from Cart" hidden="true" readonly /><br />
    <input type="TEXT" name="PROCCODE" value="00" hidden="true" readonly /><br />
    <input type="TEXT" name="RECURRING_TXN" value="no" hidden="true" readonly /><br />
    <!-- ... -->
</form>
{{-- @dd($trainingProgram); --}}
<div class="pricing-card">
    <div class="card-left">
        <h1>{{$trainingProgram->title}}</h1>
        <p>
            <span class="dollar">QAR</span>
            {{$trans_amount}}
        </p>
        <h4>{{$trainingProgram->instructor_name}}</h4>
    </div>
    <div class="card-right">
        <h1>{{$trainingProgram->instructor}}</h1>
        <ul>
            <li>&mdash; {{$trainingProgram->duration}}</li>
            <li>&mdash; {{$trainingProgram->mode_of_delivery}}</li>
            <li>&mdash; {{$trainingProgram->type}}</li>
            <li>&mdash; {{$trainingProgram->start_date->diffForHumans()}}</li>
        </ul>
        <button id="form-submit" type="submit" value="submit" class="button">Pay</button>
        {{-- <div>
            {{ $action->getModalAction('make_payment') }}
    </div>--}}
</div>
</div>
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