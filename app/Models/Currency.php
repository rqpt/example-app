<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

/**
 * For this model, I thought it might be a good idea to
 * pull in this Laravel Sushi package, so that we can
 * query the API data using Eloquent methods.
 *
 * It is also just really nice to use 😁.
 */
class Currency extends Model
{
    use \Sushi\Sushi;

    /** @var array<string, string> */
    protected $schema = [
        'id' => 'integer',
        'code' => 'string',
        'rate' => 'float',
    ];

    /**
     * Sushi uses an sqlite db behind the scenes, and this
     * is how we dynamically populate it with records.
     */
    public function getRows(): array
    {
        // See ExchangeRateServiceProvider for macro implementation.
        $forexRates = Http::exchangeRates()->get('/')->json()['forex'];

        $id = 0;

        return array_values(Arr::map($forexRates, function ($rate, $pair) use (&$id) {
            $id++;

            $code = Str::after($pair, '_');

            return compact('id', 'code', 'rate');
        }));
    }

    /**
     * The Number::currency() method converts to USD
     * by default, so that was pretty convenient.
     */
    public function convert(int|float $amount): string
    {
        return Number::currency($amount / $this->rate);
    }

    /**
     * Here is where we declare we would
     * like to cache the API response
     */
    protected function sushiShouldCache(): bool
    {
        return true;
    }
}
