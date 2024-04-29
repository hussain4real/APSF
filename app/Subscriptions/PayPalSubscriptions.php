<?php

namespace App\Subscriptions;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalSubscriptions implements Subscriptions
{
    protected $provider;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
    }

    /**
     * @return mixed
     */
    public function create(int $plan_id, int $coupon_user_id, string $method, float $amount = 0)
    {
        // Set up the shipping address
        $address = [
            'address_line_1' => '2211 N First Street',
            'address_line_2' => 'Building 17',
            'admin_area_2' => 'San Jose',
            'admin_area_1' => 'CA',
            'postal_code' => '95131',
            'country_code' => 'US',
        ];

        // Retrieve the PayPal plan ID from the selected plan
        $paypalPlanId = Plan::where('id', $plan_id)->first()->paypal_plan_id;
    }

    /**
     * @return mixed
     */
    public function cancel(?string $subscription_id = null)
    {
        // TODO: Implement cancel() method.
    }

    /**
     * @return mixed
     */
    public function pause()
    {
        // TODO: Implement pause() method.
    }

    /**
     * @return mixed
     */
    public function resume()
    {
        // TODO: Implement resume() method.
    }
}
