<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function __construct(private PaymentProviderContract $paymentProvider)
    {
    }

    public function index()
    {
        $checkout = new Checkout('teste.laravel@container.com', 456);
        return $checkout->handle($this->paymentProvider);
    }
}
