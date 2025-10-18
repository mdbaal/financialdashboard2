<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->prefix('dashboard/')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('accounts/', [AccountController::class, 'index'])->name('accounts');
    Route::get('accounts/{account}', [AccountController::class, 'show'])->name('accounts.show');
    Route::put('accounts/', [AccountController::class, 'store'])->name('accounts.store');
    Route::patch('accounts/{account}', [AccountController::class, 'update'])->name('accounts.update');
    Route::delete('accounts/', [AccountController::class, 'destroy'])->name('accounts.destroy');

    Route::put('transactions/', [TransactionController::class, 'store'])->name('transactions.store');
    Route::patch('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('transactions', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    Route::delete('transactions/', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
