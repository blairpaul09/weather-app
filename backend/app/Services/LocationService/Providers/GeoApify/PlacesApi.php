<?php

namespace App\Services\LocationService\Providers\GeoApify;

use App\Services\LocationService\Contracts\LocationServiceInterface;
use App\Services\LocationService\Providers\GeoApify\HttpClient;
use Illuminate\Support\Arr;

class PlacesApi extends HttpClient implements LocationServiceInterface
{
    /**
     * Search locations
     *
     * @param string $searchKey
     * @param array $options
     */
    public function search(string $searchKey, array $options = ['limit' => 10]): array
    {
        $options['text'] = $searchKey;

        $response = $this->get('/geocode/autocomplete', $options);

        $mapped = Arr::map($response['features'], function($item){
            return $item['properties'];
        });

        return $mapped;
    }
}
