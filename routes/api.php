<?php

use App\Http\Controllers\HandlePaymentResponse;
use App\Http\Controllers\Pay2MController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/country', function(Request $request){
    return "Hello World";
});

Route::post('/payment-response', [HandlePaymentResponse::class, 'store'])
->name('api.payment.response');