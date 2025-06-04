<?php

namespace App\Services\WeatherService\Providers\OpenWeather;

use App\Services\WeatherService\Contracts\WeatherServiceInterface;
use App\Services\WeatherService\Providers\OpenWeather\HttpClient;

class WeatherApi extends HttpClient implements WeatherServiceInterface
{
    /**
     * Get hourly forecasts
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function forecasts(float $latitude, float $longitude): array
    {
        $coordinates = [
            'lat' => $latitude,
            'lon' => $longitude,
        ];

        $response = $this->get('/forecast', $coordinates);

        return $response;
    }

    /**
     * Get current weather
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function current(float $latitude, float $longitude): array
    {
        $coordinates = [
            'lat' => $latitude,
            'lon' => $longitude,
        ];

        $response = $this->get('/weather', $coordinates);

        return $response;
    }
}
