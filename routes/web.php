<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Paddle\Checkout;

Route::view('/', 'welcome')
->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/subscribe', function (Request $request) {
    $checkout = $request->user()->checkout('pro_01hsb658a48q9bp6nrm9yz170m')
        ->returnTo(route('dashboard'));

    return view('subscribe', ['checkout' => $checkout]);
})->name('subscribe');


 
Route::get('/buy', function (Request $request) {
    $checkout = Checkout::guest(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
        ->returnTo(route('welcome'));
 
    return view('subscribe', ['checkout' => $checkout]);
});

require __DIR__.'/auth.php';
