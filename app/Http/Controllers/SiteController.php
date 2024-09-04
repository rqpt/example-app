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
        return Currency::all();
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

        $quoteCurrency = Currency::whereCode($validated['code'])->first();

        return $quoteCurrency->convert($validated['amount']);
    }
}
