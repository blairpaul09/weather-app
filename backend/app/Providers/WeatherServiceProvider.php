<?php

namespace App\Providers;

use App\Services\LocationService\Contracts\LocationServiceInterface;
use App\Services\WeatherService\Contracts\WeatherServiceInterface;
use App\Services\LocationService\Providers\GeoApify\PlacesApi;
use App\Services\WeatherService\Providers\OpenWeather\WeatherApi;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LocationServiceInterface::class, PlacesApi::class);
        $this->app->bind(WeatherServiceInterface::class, WeatherApi::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
