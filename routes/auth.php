<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Filament\Http\Controllers\Auth\EmailVerificationController;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    //    Volt::route('/admin/register',\App\Filament\Pages\Auth\Register::class)
    //        ->name('register');

    //    Volt::route('login', 'pages.auth.login')
    //        ->name('login');
    //    Volt::route('/admin/login', \App\Filament\Pages\Auth\Login::class)
    //        ->name('login');
    Volt::route('admin/login', 'App\Filament\Pages\Auth\Login')
        ->name('filament.admin.auth.login');
    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {

    Volt::route('admin/email-verification/prompt', EmailVerificationPrompt::class)
        ->name('verification.notice');

    Route::get('admin/email-verification/verify/{id}/{hash}', EmailVerificationController::class)
    ->name('filament.admin.auth.email-verification.verify');
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');
    // Volt::route('verify-email', 'pages.auth.verify-email')
    //     ->name('verification.notice');
    // Route::get('admin/email-verification/prompt', function () {

    // })->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
