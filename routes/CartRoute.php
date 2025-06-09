<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::get('/carts/{cart}', [CartController::class, 'show'])->name('carts.show');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::put('/carts/{cart}', [CartController::class, 'update'])->name('carts.update');
    Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');
});
