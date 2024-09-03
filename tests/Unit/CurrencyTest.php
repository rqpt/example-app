<?php

use App\Models\Currency;

it('can fetch exchange rates', function () {
    $exchangeRateCount = Currency::count();
    expect($exchangeRateCount)->not()->toBe(0);
});

it('can convert currencies', function () {
    $amount = 16;

    $forexRates = [
        'FOO_BAR' => 7.8262,
        'BAZ_BUZZ' => 7.732171,
        'EZ_PZ' => 28.938,
        'BEE_BOO' => 912.35,
    ];

    $expectedResults = [
        '$2.04',
        '$2.07',
        '$0.55',
        '$0.02',
    ];

    $actualResults = [];

    foreach ($forexRates as $pair => $rate) {
        $currency = new Currency;

        $currency->pair = $pair;
        $currency->rate = $rate;

        $actualResults[] = $currency->convert($amount);
    }

    expect($expectedResults)->toBe($actualResults);
});
