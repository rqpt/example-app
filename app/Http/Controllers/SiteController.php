<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function viewHome()
    {
        return view('home');
    }

    public function fetchRates()
    {
        return response()->json();
    }

    public function convertCurrency()
    {
        //
    }
}
