<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

/**
 * Our conversion method. We find the currency record by the
 * code column, and then do our conversion from there.
 *
 * We want to make sure the amount is a positive numeric value, and
 * the currency code is a string with an exact size of 3 characters.
 *
 * After those validations pass, only then do we query the db to see
 * if the currency code actualy exists.
 */
class ConversionController
{
    public function __invoke(Request $request): string|false
    {
        $validated = $request->validate([
            // As we are not managing the currencies table ourselves, we need to specify
            // the fully qualified Currency model classname for our exists rule.
            'code' => ['required', 'string', 'size:3', 'exists:App\Models\Currency,code'],
            'amount' => ['required', 'numeric', 'gte:0'],

        ]);

        $exchange = Currency::whereCode($validated['code'])->first();

        return $exchange->convert($validated['amount']);
    }
}
