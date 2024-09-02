<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class SiteController
{
    public function viewHome()
    {
        return view('home');
    }

    public function fetchRates()
    {
        return Currency::paginate();
    }

    public function convertCurrency()
    {
        //
    }
}
