<?php

use App\Livewire\FavoritosPage;
use App\Livewire\PartnerProfile;
use App\Livewire\ServicoCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Livewire\Dashboard;
use App\Http\Controllers\ServicoController;

Route::redirect('/', '/dashboard');


Route::get('dashboard', Dashboard::class)
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/partner/{slug}', PartnerProfile::class)
    ->name('partner.profile');

Route::get('/favorites/{id}', FavoritosPage::class)->middleware(['auth'])->name('favorites');


Route::prefix('servicos')->group(function () {
    Route::get('/create', ServicoCreate::class)
        ->name('servicos.create');
});


Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');


require __DIR__ . '/auth.php';
