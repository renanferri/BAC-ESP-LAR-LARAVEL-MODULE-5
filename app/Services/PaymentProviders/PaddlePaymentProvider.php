<?php

namespace App\Services\PaymentProviders;


use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;
use App\Services\Utils\Http;


class PaddlePaymentProvider implements PaymentProviderContract
{
    public function __construct(Http $clientHttp)
    {
    }

    public function charge(string $email, int $amount) : string
    {
        return "We successfully charged EUR {$amount} from {$email}";
    }
}
