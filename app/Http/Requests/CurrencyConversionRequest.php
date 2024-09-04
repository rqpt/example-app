<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyConversionRequest extends FormRequest
{
    /**
     * Anyone can make this request, as we are not modifying any state here.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * We want to make sure the amount is a positive numeric value, and
     * the currency code is a string with an exact size of 3 characters.
     *
     * After those validations pass, only then do we query the db to see
     * if the currency code actualy exists.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // As we are not managing the currencies table ourselves, we need to specify
            // the fully qualified Currency model classname for our exists rule.
            'code' => ['required', 'string', 'size:3', 'exists:App\Models\Currency,code'],
            'amount' => ['required', 'numeric', 'gte:0'],
        ];
    }
}
