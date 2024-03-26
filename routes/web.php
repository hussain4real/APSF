<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\RedirectIfSubscribed;
use App\Livewire\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Paddle\Checkout;
use Laravel\Paddle\Transaction;

Route::view('/', 'welcome')
->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/subscribe', [SubscriptionController::class, 'create'])
->middleware(['auth',RedirectIfSubscribed::class])
->name('subscribe');

Route::get('/update-payment-method', [SubscriptionController::class, 'updatePaymentMethod'])
    ->name('update-payment-method');

Route::get('/confirmation', Subscribe::class)
    ->name('confirmation');

 
Route::get('/download-invoice/{transaction}', function (Request $request, Transaction $transaction) {
    return $transaction->redirectToInvoicePdf();
})->name('download-invoice');
 
Route::get('/buy', function (Request $request) {
    $checkout = Checkout::guest(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
        ->returnTo(route('welcome'));
 
    return view('subscribe', ['checkout' => $checkout]);
});

require __DIR__.'/auth.php';
