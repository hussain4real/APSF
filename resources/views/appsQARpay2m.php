 <html>
 <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
<body>
    <h1>pay2m Example Code For Redirection Payment Request</h1>
    <?php
    $merchant_id = 1010;
    $secured_key = 'MjmFgnErr_2QtwlhjOhE';
    $num = 1;
    $basket_id = 'Basket Item-1';
    $trans_amount = $num;
    if (count($_GET) > 0) {
        processResponse($merchant_id, $basket_id, $trans_amount, $_GET);
    }
    $token = getAccessToken($merchant_id, $secured_key, $basket_id, $trans_amount);
    /**
     * get access token with merchant id, secured key, basket id, transaction amount
     */
    function getAccessToken($merchant_id, $secured_key, $basket_id, $trans_amount)
    {
        $tokenApiUrl = 'https://payments.pay2m.com/Ecommerce/api/Transaction/GetAccessToken';
        $urlPostParams = sprintf(
            'MERCHANT_ID=%s&SECURED_KEY=%s&TXNAMT=%s&BASKET_ID=%s',
            $merchant_id,
            $secured_key,
            $trans_amount,
            $basket_id
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenApiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $urlPostParams);
        curl_setopt($ch, CURLOPT_USERAGENT, 'CURL/PHP pay2m Example');
        $response = curl_exec($ch);
        curl_close($ch);
        $payload = json_decode($response);
        $token = isset($payload->ACCESS_TOKEN) ? $payload->ACCESS_TOKEN : '';

        return $token;
    }
    /**
     * process response coming from pay2m
     */
    function processResponse($merchant_id, $original_basket_id, $txnamt, $response)
    {
        /**
         * following parameters sent from pay2m after success/failed transaction
         */
        $trans_id = $response['transaction_id'];
        $err_code = $response['err_code'];
        $err_msg = $response['err_msg'];
        $basket_id = $response['basket_id'];
        $order_date = $response['order_date'];
        $response_key = $response['Response_Key'];
        $payment_name = $response['PaymentName'];
        $secretword = ''; // No secret code defined for merchant id 102, secret code can be entered in merchant portal.
        $response_string = sprintf('%s%s%s%s%s', $merchant_id, $original_basket_id, $secretword, $txnamt, $err_code);
        $response_hash = hash('MD5', $response_string);
        if (strtolower($response_hash) != strtolower($response_key)) {
            echo '<br/>Transaction could not be varified<br/>';

            return;
        }

        if ($err_code == '000' || $err_code == '00') {
            echo '<strong>Transaction Successfully Completed. Transaction ID: '.$trans_id.'</strong><br/>';
            echo '<br/>Date: '.$order_date;

            return;
        }
        echo '<br/>Transaction Failed. Message: '.$err_msg;
    }
    ?>
    <!-- For data integrity purpose, transaction amount and basket_id should be the same as the ones sent in token request -->

    <!-- 
        Actual Payment Request
    -->
 <div class="container">
            <div class ="alert alert-success"> Reload page to get new token</div>
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        Pay2m Web Checkout - Example Code
                    </div>
    <form id='pay2m_payment_form' name='pay2m-payment-form' method='post' action=" https://payments.pay2m.com/Ecommerce/api/Transaction/PostTransaction">
        Currency Code: <input type="TEXT" name="CURRENCY_CODE" value="QAR" /><br />
        Merchant ID: <input type="TEXT" name="MERCHANT_ID" value="<?php echo $merchant_id; ?>" /><br />
        Merchant Name: <input type="TEXT" name="MERCHANT_NAME" value="UAT Demo Merchant " /><br />
        Token: <input type="TEXT" name="TOKEN" value="<?php echo $token; ?>" /><br />
        Success URL: <input type="TEXT" name="SUCCESS_URL" value="http://merchant-site-example.com" /><br />
        Failure URL: <input type="TEXT" name="FAILURE_URL" value="http://merchant-site-example.com" /><br />
        Checkout URL: <input type="TEXT" name="CHECKOUT_URL" value="http://merchant-site-example.com" /><br />
        Customer Email: <input type="TEXT" name="CUSTOMER_EMAIL_ADDRESS" value="some-email@example.com" /><br />
        Customer Mobile: <input type="TEXT" name="CUSTOMER_MOBILE_NO" value="+974-34312767" /><br />
        Transaction Amount: <input type="TEXT" name="TXNAMT" value="<?php echo $trans_amount; ?>" /><br />
        Basket ID: <input type="TEXT" name="BASKET_ID" value="<?php echo $basket_id; ?>" /><br />
        Transaction Date: <input type="TEXT" name="ORDER_DATE" value="<?php echo date('Y-m-d H:i:s', time()); ?>" /><br />
        Signature: <input type="TEXT" name="SIGNATURE" value="SOME-RANDOM-STRING" /><br />
        Version: <input type="TEXT" name="VERSION" value="MERCHANT-CART-0.1" /><br />
        Item Description: <input type="TEXT" name="TXNDESC" value="Item Purchased from Cart" /><br />
        Proccode: <input type="TEXT" name="PROCCODE" value="00" /><br />
        <input type="SUBMIT" value="SUBMIT">
          </form> 
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </div>
</body>
</html>
