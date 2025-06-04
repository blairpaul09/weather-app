<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherCoodinateRequest;
use App\Http\Resources\CurrentWeatherResource;
use App\Http\Resources\ForecastsResource;
use App\Services\WeatherService\Contracts\WeatherServiceInterface;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Create new Controller instance
     */
    public function __construct(private WeatherServiceInterface $weather) {}

    /**
     * Get the current weather details of the specified
     * location
     *
     * @param WeatherCoodinateRequest $request
     */
    public function current(WeatherCoodinateRequest $request)
    {
        $currentWeather = $this->weather->current($request->latitude, $request->longitude);

        return CurrentWeatherResource::make($currentWeather);
    }

    /**
     * Get the forecasts weather details of the specified
     * location
     *
     * @param WeatherCoodinateRequest $request
     */
    public function forecasts(WeatherCoodinateRequest $request)
    {
        $forecasts = $this->weather->forecasts($request->latitude, $request->longitude);

        return ForecastsResource::make($forecasts);
    }
}
