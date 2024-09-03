<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ExchangeRateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Http::macro('exchangeRates', function () {
            return Http::baseUrl(config('third-party-api.exchange-rates'));
        });
    }
}
