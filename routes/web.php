<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Auth::login(User::first());

    return view('dashboard');
});

Route::view('/twitter', 'twitter')->name('twitter');

Route::get('/blue/subscribe', SubscribeController::class)
    ->middleware(Authenticate::class)
    ->name('blue.subscribe');

Route::view('/dashboard', 'dashboard')
    ->middleware([Authenticate::class, EnsureEmailIsVerified::class])
    ->name('home');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
