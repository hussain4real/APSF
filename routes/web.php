<?php

use App\Http\Controllers\BoardOfTrusteeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LivefeedController;
use App\Http\Controllers\Pay2MController;
use App\Http\Controllers\PublicVoteController;
use App\Livewire\Subscribe;
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
Route::get('/membership', [\App\Http\Controllers\MembershipController::class, 'index'])
    ->name('membership');

//course enrollment
Route::view('/enroll-payment', 'enrolment.pay')
    ->name('enrolment.pay');
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
        'show' => 'event.show',
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

Route::view('contest', 'announcement.contest')
    ->name('contest');

// Route::get('livefeed', [LiveFeedController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('livefeeds');
Route::get('/testtransactionemail', function () {
    $transaction = \App\Models\Transaction::first();

    return (new \App\Notifications\InvoicePaid($transaction))
        ->toMail($transaction->user);

});

Route::get('/testsubscriptionemail', function () {
    $subscription = \App\Models\Subscription::first();

    return (new \App\Notifications\SubscriptionStarted($subscription))
        ->toMail($subscription->user);

});

Route::get('/testwelcomeemail', function () {
    $user = \App\Models\User::first();

    return (new \App\Notifications\MemberWelcome())
        ->toMail($user);

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

//route to handle checkout event coming from the payment gateway
Route::post('/checkout', [Pay2MController::class, 'checkout'])
    ->name('checkout');

Route::get('/vote', [PublicVoteController::class, 'create'])
    ->name('vote.create');
Route::post('/vote', [PublicVoteController::class, 'store'])
    ->name('vote.store');
Route::get('/view-votes', [PublicVoteController::class, 'index'])
    ->name('view-votes');

Route::get('scholarships', \App\Livewire\ListScholarships::class)
    ->name('scholarships');
Route::get('training-programs', \App\Livewire\TrainingPrograms\ListTrainingPrograms::class)
    ->name('training-programs');
require __DIR__.'/auth.php';
