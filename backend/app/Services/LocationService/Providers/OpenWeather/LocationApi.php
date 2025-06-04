<?php

namespace App\Services\LocationService\Providers\OpenWeather;

use App\Services\LocationService\Contracts\LocationServiceInterface;
use App\Services\LocationService\Providers\OpenWeather\HttpClient;

class LocationApi extends HttpClient implements LocationServiceInterface
{
    /**
     * Create new HttpClient instance
     */
    public function __construct()
    {
        parent::__construct(apiVersion: '1.0', apiType: 'geo');
    }

    /**
     * Search locations
     *
     * @param string $searchKey
     * @param array $options
     */
    public function search(string $searchKey, array $options = ['limit' => 10]): array
    {
        $options['q'] = $searchKey;

        $response = $this->get('/direct', $options);

        return $response;
    }
}
