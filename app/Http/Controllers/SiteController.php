<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyConversionRequest;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class SiteController
{
    public function viewHome(): View
    {
        return view('home');
    }

    /**
     * @return Collection<int, Currency>
     */
    public function fetchRates(): Collection
    {
        return Currency::query()
            ->orderBy('code')
            ->get();
    }

    /**
     * Our conversion method. We find the currency record by the
     * code column, and then do our conversion from there.
     *
     * Please see the App\Http\Requests\CurrencyConversionRequest for validations.
     */
    public function convertCurrency(CurrencyConversionRequest $request): string|false
    {
        $validated = $request->validated();

        $exchange = Currency::whereCode($validated['code'])->first();

        return $exchange->convert($validated['amount']);
    }
}
