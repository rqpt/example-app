<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ExchangeRateServiceProvider extends ServiceProvider
{
    /**
     * We set up this Http macro so our model is a bit cleaner,
     * and we have a nice and simple API to work with.
     */
    public function boot(): void
    {
        $url = 'https://www.completeapi.com/free_currencies.min.json';

        Http::macro('exchangeRates', fn () => Http::baseUrl($url));
    }
}
