<?php

use App\Livewire\PartnerProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Livewire\Dashboard;


Route::redirect('/', '/dashboard');


Route::get('dashboard', Dashboard::class)

    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/partner/{slug}', PartnerProfile::class)
    ->name('partner.profile');


Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');


require __DIR__ . '/auth.php';
