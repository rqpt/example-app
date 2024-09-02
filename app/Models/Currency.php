<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class Currency extends Model
{
    use \Sushi\Sushi;

    protected $schema = [
        'id' => 'integer',
        'pair' => 'string',
        'rate' => 'float',
    ];

    public function getRows(): array
    {
        $forexRates = json_decode(Http::get('https://www.completeapi.com/free_currencies.min.json')->body(), true)['forex'];

        return array_values(Arr::map($forexRates, fn ($rate, $currency) => ['pair' => $currency, 'rate' => $rate]));
    }

    protected function sushiShouldCache(): bool
    {
        return true;
    }
}
