<?php

use App\Http\Controllers\ConversionController;
use App\Models\Currency;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::get('/rates', fn () => Currency::all());
Route::post('/convert', ConversionController::class);
