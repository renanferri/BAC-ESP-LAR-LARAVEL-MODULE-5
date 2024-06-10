<?php

namespace App\Providers;

use App\Http\Controllers\CieloController;
use App\Http\Controllers\StripeController;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(StripeController::class)
            ->needs(PaymentProviderContract::class)
            ->give(StripePaymentProvider::class);

        $this->app->when(CieloController::class)
            ->needs(PaymentProviderContract::class)
            ->give(CieloPaymentProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
