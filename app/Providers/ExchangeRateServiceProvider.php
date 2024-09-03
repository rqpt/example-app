<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ExchangeRateServiceProvider extends ServiceProvider
{
    /**
     * We set up this little Http macro so our model is a bit
     * cleaner. It fetches the api url from our config/env,
     * so in our model we have a nice clean api.
     */
    public function boot(): void
    {
        Http::macro('exchangeRates', function () {
            return Http::baseUrl(config('third-party-api.exchange-rates'));
        });
    }
}
