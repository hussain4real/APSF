<?php

use App\Http\Controllers\LemonSqueezySubscriptionController;
use App\Http\Controllers\LivefeedController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\RedirectIfSubscribed;
use App\Livewire\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Paddle\Checkout;
use Laravel\Paddle\Transaction;
use Livewire\Volt\Volt;

// Route::view('/', 'home.welcome')
//     ->name('welcome');
Volt::route('/livefeeds', 'livefeeds.list');
Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }

    return view('home.welcome');
})->name('welcome');
Route::view('/about', 'home.about')
    ->name('about');
Route::view('/founders-committee', 'home.founders_committee')
    ->name('founders-committee');
Route::view('/board-of-trustees', 'home.board_of_trustees')
    ->name('board-of-trustees');
Route::view('/general-secretariat', 'home.general_secretariat')
    ->name('general-secretariat');
Route::view('/services', 'home.services')
    ->name('services');
Route::view('/events', 'home.events')
    ->name('events');
Route::view('/contact', 'home.contact')
    ->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Route::get('livefeed', [LiveFeedController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('livefeeds');
Route::get('/testemail', function () {
    $user = App\Models\User::find(1);
    $user->notify(new App\Notifications\TestEmail());

    //redirect to welcome page
    return redirect('/');
});
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/subscribe', [SubscriptionController::class, 'create'])
    ->middleware(['auth', RedirectIfSubscribed::class])
    ->name('subscribe');

Route::get('/lemon-squeezy-subscription', [LemonSqueezySubscriptionController::class, 'create'])
    ->middleware(['auth', RedirectIfSubscribed::class])
    ->name('lemon-squeezy-subscription');

Route::get('/update-payment-method', [SubscriptionController::class, 'updatePaymentMethod'])
    ->name('update-payment-method');

Route::get('/confirmation', Subscribe::class)
    ->name('confirmation');

//Route::get('/download-invoice/{transaction}', function (Request $request, Transaction $transaction) {
//    return $transaction->redirectToInvoicePdf();
//})->name('download-invoice');
//
//Route::get('/buy', function (Request $request) {
//    $checkout = Checkout::guest(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
//        ->returnTo(route('welcome'));
//
//    return view('subscribe', ['checkout' => $checkout]);
//});

require __DIR__ . '/auth.php';
