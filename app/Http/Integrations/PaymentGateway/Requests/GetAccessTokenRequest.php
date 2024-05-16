<?php

namespace App\Http\Integrations\PaymentGateway\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GetAccessTokenRequest extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $merchantId,
        protected readonly string $securedKey,
        protected readonly int $transAmount,
        protected readonly string $basketId,
    ) {

    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/GetAccessToken';
    }

    //    protected function defaultQuery(): array
    //    {
    //        //
    //    }
    public function defaultBody(): array
    {
        return [
            'MERCHANT_ID' => $this->merchantId,
            'SECURED_KEY' => $this->securedKey,
            'TXNAMT' => $this->transAmount,
            'BASKET_ID' => $this->basketId,
        ];
    }
}
