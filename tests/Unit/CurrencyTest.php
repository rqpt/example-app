<?php

use App\Currency;

it('can fetch exchange rates', function () {
    $exchangeRateCount = Currency::count();
    expect($exchangeRateCount)->not()->toBe(0);
});

it('can convert currencies', function () {
    $amount = 16;

    $forexRates = [
        'FOO' => 7.8262,
        'BAR' => 7.732171,
        'BAZ' => 28.938,
        'FIZZ' => 912.35,
    ];

    $expectedResults = [
        '$2.04',
        '$2.07',
        '$0.55',
        '$0.02',
    ];

    $actualResults = [];

    foreach ($forexRates as $code => $rate) {
        $currency = new Currency;

        $currency->code = $code;
        $currency->rate = $rate;

        $actualResults[] = $currency->convert($amount);
    }

    expect($expectedResults)->toBe($actualResults);
});
