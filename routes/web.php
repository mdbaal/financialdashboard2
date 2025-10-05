<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard/')->group(function () {
    Route::get('accounts', function () {
      return Inertia::render('account/Accounts'); 
    })->name("accounts");
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
