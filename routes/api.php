<?php

use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderListController;
use App\Http\Controllers\API\ReservationController;
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

    Route::post('/upload', [UploadController::class, 'uploadFile']);



    Route::apiResource('users', UserController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('order_lists', OrderListController::class);
    Route::apiResource('tables', TableController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('foods', FoodController::class);
});



