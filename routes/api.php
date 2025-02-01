<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'version' => '1.0.0',
    ])->header('Access-Control-Allow-Origin', '*');
});
