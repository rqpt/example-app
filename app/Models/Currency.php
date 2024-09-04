<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

/**
 * For this model, I thought it might be a good idea to
 * pull in this Laravel Sushi package, so that we can
 * query the API data using Eloquent methods.
 */
class Currency extends Model
{
    use \Sushi\Sushi;

    /**
     * Sushi uses an sqlite db behind the scenes, and this
     * is how we dynamically populate it with records.
     */
    public function getRows(): array
    {
        $forexRates = Http::exchangeRates()->get('/')->json()['forex'];

        return array_values(
            Arr::map(
                $forexRates, function ($rate, $pair) {
                    $code = Str::after($pair, '_');

                    return compact('code', 'rate');
                }
            )
        );
    }

    /**
     * We want to sort these currencies alphabetically, so we
     * might as well scope them that way from the get go.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(
            'alphabetised', function (Builder $builder) {
                $builder->orderBy('code');
            }
        );
    }

    /**
     * Number::currency() converts to USD by
     * default, so that was pretty convenient.
     */
    public function convert(int|float $amount): string
    {
        return Number::currency($amount / $this->rate);
    }

    /**
     * Here is where we set Sushi up to cache
     * the API responses.
     */
    protected function sushiShouldCache(): bool
    {
        return true;
    }
}
