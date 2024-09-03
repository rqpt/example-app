<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Number;

/**
 * For this model, I thought it might be a good idea to
 * pull in this Laravel Sushi package, so that we can
 * query the API data using Eloquent methods.
 *
 * It caches the response from our API call and
 * its also just really nice to use 😁.
 */
class Currency extends Model
{
    use \Sushi\Sushi;

    /** @var array<string, string> */
    protected $schema = [
        'id' => 'integer',
        'pair' => 'string',
        'rate' => 'float',
    ];

    /** @return array{int, array{''}}  */
    public function getRows(): array
    {
        $forexRates = Http::exchangeRates()->get('/')->json()['forex'];

        $id = 0;

        return array_values(Arr::map($forexRates, function ($rate, $currency) use (&$id) {
            $id++;

            return ['id' => $id, 'pair' => $currency, 'rate' => $rate];
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

    protected function sushiShouldCache(): bool
    {
        return true;
    }
}
