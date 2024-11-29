<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('vehicles', [VehicleController::class, 'store']);
Route::get('vehicles', [VehicleController::class, 'index']);
Route::put('vehicles/{vehicle}', [VehicleController::class, 'update']);
Route::delete('vehicles/{vehicle}', [VehicleController::class, 'destroy']);
