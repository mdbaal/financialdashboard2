<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard/')->group(function () {
    Route::get('accounts', [AccountController::class,'index'])->name("accounts");
    Route::get('accounts/{account}',[AccountController::class,'show'])->name('account.show');
    Route::put('accounts',[AccountController::class,'store'])->name('accounts.store');
    Route::patch('accounts/{account}',[AccountController::class, 'update'])->name('accounts.update');
    Route::delete('accounts',[AccountController::class,'destroy'])->name('accounts.destroy');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
