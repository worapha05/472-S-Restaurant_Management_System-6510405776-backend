<?php

use App\Http\Controllers\API\Auth\AuthenticateController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\InventoryLogController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderListController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\StockEntryController;
use App\Http\Controllers\API\StockItemController;
use App\Http\Controllers\API\TableController;
use App\Http\Controllers\API\UploadController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:api')->group(function () {
    Route::get('/', function () {
        return [
            'success' => true,
            'version' => '1.0.0',
        ];
    });

    // Public routes (no authentication required)
    Route::post('login', [AuthenticateController::class, 'login'])->name('user.login');

    // Food routes accessible without authentication
    Route::get('foods', [FoodController::class, 'index']);
    Route::get('foods/{food}', [FoodController::class, 'show']);

    // Tables
    Route::get('tables', [TableController::class, 'index']);
    Route::get('tables/{tables}', [TableController::class, 'show']);

    // Protected routes (authentication required)
    Route::middleware('auth:sanctum')->group(function () {
        // Authentication
        Route::delete('revoke', [AuthenticateController::class, 'revoke'])->name('user.revoke');
        Route::get('/users/{userId}/orders', [OrderController::class, 'getOrdersByUser']);

        // Food management (create, update, delete) require authentication
        Route::post('foods', [FoodController::class, 'store']);
        Route::put('foods/{food}', [FoodController::class, 'update']);
        Route::patch('foods/{food}', [FoodController::class, 'update']);

        Route::post('users', [FoodController::class, 'store']);
        Route::put('users/{user}', [FoodController::class, 'update']);
        Route::patch('users/{user}', [FoodController::class, 'update']);

        Route::apiResource('users', UserController::class);
        Route::apiResource('orders', OrderController::class);
        Route::apiResource('order_lists', OrderListController::class);

        Route::apiResource('stockItems', StockItemController::class);
        Route::apiResource('stockEntries', StockEntryController::class);
        Route::apiResource('inventoryLogs', InventoryLogController::class);

        Route::apiResource('reservations', ReservationController::class);

        // File upload
        Route::post('upload', [UploadController::class, 'uploadFile']);

        Route::get('/users/{userId}/reservations', [ReservationController::class, 'getReservationsByUser']);
    });


});
