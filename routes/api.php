<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;

// API Routes
Route::middleware('api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('carts', CartController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('order-items', OrderItemController::class);
    Route::apiResource('products', ProductController::class);

    // Additional routes can be defined here
    foreach (glob(__DIR__ . '/*Route.php') as $routeFile) {
        require $routeFile;
    }
});

