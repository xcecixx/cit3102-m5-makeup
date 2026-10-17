<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MakeupController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/makeups', [MakeupController::class, 'index']);
    Route::post('/makeups', [MakeupController::class, 'store']);
    Route::get('/makeups/{makeup}', [MakeupController::class, 'show']);
    Route::put('/makeups/{makeup}', [MakeupController::class, 'update']);
    Route::delete('/makeups/{makeup}', [MakeupController::class, 'destroy']);
});
