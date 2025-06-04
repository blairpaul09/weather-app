<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('locations', LocationController::class);

Route::prefix('weather')->group(function(){
    Route::post('current', [WeatherController::class, 'current']);
    Route::post('forecasts', [WeatherController::class, 'forecasts']);
});
