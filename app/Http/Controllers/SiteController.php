<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class SiteController
{
    public function viewHome()
    {
        return view('home');
    }

    public function fetchRates()
    {
        return Currency::all();
    }

    public function convertCurrency(Request $request): string
    {
        $request->validate([
            'quote' => ['required'],
            'amount' => ['required', 'min:0'],
        ]);

        $exchange = Currency::findOrFail((int) $request->quote);

        return $exchange->convert($request->amount);
    }
}
