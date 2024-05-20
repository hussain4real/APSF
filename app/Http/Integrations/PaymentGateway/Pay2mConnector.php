<?php

namespace App\Http\Integrations\PaymentGateway;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\QueryAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class Pay2mConnector extends Connector
{
    use AcceptsJson;

    //    public function __construct(
    //        protected readonly string $merchantId,
    //        protected readonly string $securedKey,
    //        protected readonly string $basketId,
    //        protected readonly string $transAmount,
    //
    //    ) {
    //    }

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://payments.pay2m.com/Ecommerce/api/Transaction/';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [
            'verify' => false, //TODO: Remove this in production
        ];
    }

    //    protected function defaultAuth(): ?Authenticator
    //    {
    //        return new QueryAuthenticator('SECURED_KEY', config('services.pay2m.secured_key'));
    //    }
}
