<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Currency extends Model
{
    use \Sushi\Sushi;

    public static function getRates() {}

    public function getRows()
    {
        return Http::get('https://www.completeapi.com/free_currencies.min.json');
    }
}
