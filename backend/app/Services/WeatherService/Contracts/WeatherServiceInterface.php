<?php

namespace App\Services\WeatherService\Contracts;

interface WeatherServiceInterface
{
    /**
     * Get current weather
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function current(float $latitude, float $longitude) : array;

    /**
     * Get forecasts weather
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function forecasts(float $latitude, float $longitude) : array;
}
