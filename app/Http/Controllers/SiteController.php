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
     */
    public function convertCurrency(Request $request): string|false
    {
        $request->validate(
            [
                // As the currencies table is not directly managed by us, we need to specify
                // the fully qualified model class path for the exists validation rule
                'code' => ['required', 'string', 'size:3', 'exists:App\Models\Currency,code'],
                'amount' => ['required', 'numeric', 'gte:0'],
            ]
        );

        $exchange = Currency::whereCode($request->code)->first();

        return $exchange->convert($request->amount);
    }
}
