<?php

use App\Http\Controllers\CieloController;
use App\Http\Controllers\StripeController;
use App\Services\Checkout;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\PaddlePaymentProvider;
use App\Services\PaymentProviders\StripePaymentProvider;
use App\Services\Utils\Http;
use App\Services\Utils\ThirdParty;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lerning-container', function(StripePaymentProvider $paymentProvider){

    //$paymentProvider = app(CieloPaymentProvider::class);

    $checkout = new Checkout('teste.laravel@container.com', 456);

    // return $checkout->handle(new PaddlePaymentProvider(new Http(new ThirdParty)));
    return $checkout->handle($paymentProvider);
});


Route::get('/stripe', [StripeController::class, 'index']);

Route::get('/cielo', [CieloController::class, 'index']);

