<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::apiResource('services', ServiceController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);

Route::post('/orders', [OrderController::class, 'store']);

// Admin routes (accessible via the private dashboard)
Route::get('/admin/orders', [OrderController::class, 'index']);
Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});
