<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RouteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/routes/optimize', [RouteController::class, 'optimize']);
    Route::post('/routes/{route}/complete', [RouteController::class, 'markAsCompleted']);
});