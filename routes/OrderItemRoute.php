<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderItemController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/order-items', [OrderItemController::class, 'index'])->name('order-items.index');
    Route::get('/order-items/{orderItem}', [OrderItemController::class, 'show'])->name('order-items.show');
    Route::post('/order-items', [OrderItemController::class, 'store'])->name('order-items.store');
    Route::put('/order-items/{orderItem}', [OrderItemController::class, 'update'])->name('order-items.update');
    Route::delete('/order-items/{orderItem}', [OrderItemController::class, 'destroy'])->name('order-items.destroy');
});

