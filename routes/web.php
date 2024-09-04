<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(
    function () {
        Route::get('/', 'viewHome');
        Route::get('/rates', 'fetchRates');
        Route::post('/convert', 'convertCurrency');
    }
);
