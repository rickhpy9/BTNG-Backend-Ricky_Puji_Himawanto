<?php

use App\Http\Controllers\Api\MobilController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::apiResource('mobil', MobilController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');