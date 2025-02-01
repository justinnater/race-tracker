<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LapTimeController;
use Illuminate\Support\Facades\Route;

Route::get('/car/{car}', [CarController::class, 'show']);
Route::get('/car', [CarController::class, 'index']);

Route::post('/laptime/{car}', [LapTimeController::class, 'store']);
