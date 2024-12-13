<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('register/{type}', 'pages.auth.register')
        ->where('type', 'partner')
        ->name('partner-register');

    Volt::route('register/identity', 'pages.auth.register-identity')
        ->name('register-identity');

    Volt::route('register/company', 'pages.auth.register-company')
        ->name('register-company');

    Volt::route('register/plan-selection', 'pages.auth.register-plan-selection')
        ->name('register-plan-selection');

});

Route::middleware('guest')->group(function () {

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
