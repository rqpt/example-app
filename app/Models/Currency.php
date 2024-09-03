<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Number;

class Currency extends Model
{
    use \Sushi\Sushi;

    /** @var array<string, string> */
    protected $schema = [
        'id' => 'integer',
        'pair' => 'string',
        'rate' => 'float',
    ];

    /** @return array<int, mixed>  */
    public function getRows(): array
    {
        $forexRates = json_decode(Http::get('https://www.completeapi.com/free_currencies.min.json')->body(), true)['forex'];

        $id = 0;

        return array_values(Arr::map($forexRates, function ($rate, $currency) use (&$id) {
            $id++;

            return ['id' => $id, 'pair' => $currency, 'rate' => $rate];
        }));
    }

    public function convert(int|float $amount): string|false
    {
        return Number::currency($amount / $this->rate);
    }

    protected function sushiShouldCache(): bool
    {
        return true;
    }
}
