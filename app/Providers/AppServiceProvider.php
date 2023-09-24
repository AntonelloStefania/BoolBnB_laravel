<?php

namespace App\Providers;
use App\Providers\Braintree_Configuration;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $environment = env('BRAINTREE_ENV');
        $merchantId = env('BRAINTREE_MERCHANT_ID');
        $publicKey = env('BRAINTREE_PUBLIC_KEY');
        $privateKey = env('BRAINTREE_PRIVATE_KEY');
        $braintree = new \Braintree\Gateway([
        'environment' => $environment,
        'merchantId' => $merchantId,
        'publicKey' => $publicKey,
        'privateKey' => $privateKey
    ]);
    config(['braintree' => $braintree]); 
    }
}
