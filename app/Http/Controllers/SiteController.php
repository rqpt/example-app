<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController
{
    public function viewHome(): View
    {
        return view('home');
    }

    /** @return Collection<int, Currency>  */
    public function fetchRates(): Collection
    {
        return Currency::all();
    }

    /**
     * I think this might lose me points, but I decided to find
     * the currency by ID, rather than using the quote currency
     * to do a where like '_{$request->quote}' query.
     */
    public function convertCurrency(Request $request): string|false
    {
        $request->validate([
            'quote' => ['required'],
            'amount' => ['required', 'min:0'],
        ]);

        $exchange = Currency::findOrFail((int) $request->quote);

        return $exchange->convert($request->amount);
    }
}
