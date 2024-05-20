<?php

use App\Http\Controllers\BoardOfTrusteeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LemonSqueezySubscriptionController;
use App\Http\Controllers\LivefeedController;
use App\Http\Controllers\Pay2MController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\RedirectIfSubscribed;
use App\Livewire\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/coming-soon', 'coming_soon')
    ->name('coming-soon');
Route::view('/terms-and-conditions', 'home.terms-of-service')
    ->name('terms-and-conditions');
Route::view('/', 'home.welcome')
    ->name('welcome');
Route::view('/privacy-policy', 'home.privacy-policy')
    ->name('privacy-policy');
Route::view('/refund-policy', 'home.refund-policy')
    ->name('refund-policy');
//Volt::route('/livefeeds', 'livefeeds.list');
Route::view('/pricing', 'home.pricing')
    ->name('pricing');
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::resource('board-of-trustees', BoardOfTrusteeController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'board-of-trustees.index',
        'show' => 'board-of-trustee.show',
    ]);
Route::resource('events', EventController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'events.index',
        'show' => 'events.show',
    ]);
Route::view('/about', 'home.about')
    ->name('about');
Route::view('/founders-committee', 'home.founders_committee')
    ->name('founders-committee');
//Route::view('/board-of-trustees', 'home.board.board_of_trustees')
//    ->name('board-of-trustees');
Route::view('/general-secretariat', 'home.general_secretariat')
    ->name('general-secretariat');
Route::view('/services', 'home.services')
    ->name('services');
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

Route::view('/appsQARpay2m', 'appsQARpay2m')
    ->name('appsQARpay2m');
//payment routes
Route::get('/subscribe', [Pay2MController::class, 'create'])
    ->name('subscribe');

//Route::post('/process', [Pay2MController::class, 'store'])
//    ->name('subscribe.store');
Route::get('/payment-response', [Pay2MController::class, 'handleResponse'])
    ->name('payment.response');
//Route::get('/subscribe', [SubscriptionController::class, 'create'])
//    ->middleware(['auth', RedirectIfSubscribed::class])
//    ->name('subscribe');

//Route::get('/lemon-squeezy-subscription', [LemonSqueezySubscriptionController::class, 'create'])
//    ->middleware(['auth', RedirectIfSubscribed::class])
//    ->name('lemon-squeezy-subscription');
//
//Route::get('/update-payment-method', [SubscriptionController::class, 'updatePaymentMethod'])
//    ->name('update-payment-method');
//
//Route::get('/confirmation', Subscribe::class)
//    ->name('confirmation');

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
//Route::get('create-transactions', [PayPalController::class, 'create'])
//    ->name('create-transactions');
//Route::get('payment', [PayPalController::class, 'processTransaction'])->name('payment');
//Route::get('/cancel', [PayPalController::class, 'cancelTransaction'])->name('payment.cancel');
//Route::get('/payment/success', [PayPalController::class, 'successTransaction'])->name('payment.success');
require __DIR__.'/auth.php';
