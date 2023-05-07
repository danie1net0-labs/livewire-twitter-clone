<?php

use App\Http\Controllers\BlueSubscribeController;
use App\Http\Controllers\GoldSubscribeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/twitter')->name('home');

Route::view('/twitter', 'twitter')
    ->middleware([Authenticate::class, EnsureEmailIsVerified::class])
    ->name('twitter');

Route::get('/blue/subscribe', BlueSubscribeController::class)
    ->middleware(Authenticate::class)
    ->name('blue.subscribe');

Route::get('/organization/subscribe', GoldSubscribeController::class)
    ->middleware(Authenticate::class)
    ->name('organization.subscribe');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
