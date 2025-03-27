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

    // Protected routes (authentication required)
    Route::middleware('auth:sanctum')->group(function () {
        // Authentication
        Route::delete('revoke', [AuthenticateController::class, 'revoke'])->name('user.revoke');
    });

    Route::apiResource('foods', FoodController::class);

    //Put it inside auth after finish the system
    // File upload
    Route::post('upload', [UploadController::class, 'uploadFile']);

    // Resources that require authentication
    Route::apiResource('users', UserController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('order_lists', OrderListController::class);
    Route::apiResource('tables', TableController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('stockItems', StockItemController::class);
    Route::apiResource('stockEntries', StockEntryController::class);
    Route::apiResource('inventoryLogs', InventoryLogController::class);

    Route::get('/users/{userId}/orders', [OrderController::class, 'getOrdersByUser']);
    Route::get('/users/{userId}/reservations', [ReservationController::class, 'getReservationsByUser']);
});
