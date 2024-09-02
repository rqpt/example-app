<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'viewHome')->name('home');
    Route::get('/rates', 'fetchRates')->name('rates');
    Route::post('/convert', 'convertCurrency')->name('convert');
});
