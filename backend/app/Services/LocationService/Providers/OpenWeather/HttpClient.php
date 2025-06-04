<?php

namespace App\Services\LocationService\Providers\OpenWeather;

use Illuminate\Support\Facades\Http;

class HttpClient
{
    /**
     * The api version to user
     *
     * @var string apiVersion
     */
    protected string $apiVersion;

    /**
     * Open weather base api url.
     *
     * @var string $apiUrl
     */
    protected string $apiUrl;

    /**
     * Api key from open weather
     *
     * @var string apiKey
     */
    protected string $apiKey;

    /**
     * The api type to use
     *
     * @var string apiType
     */
    protected string $apiType;

    /**
     * Create new HttpClient instance
     *
     * @param string $apiVersion
     * @param string $apiUrl
     */
    public function __construct(
        string $apiVersion = '2.5',
        string $apiType = 'data',
        string $apiUrl = 'https://api.openweathermap.org'
    ) {
        $this->apiKey =  config('open-weather.api_key');
        $this->apiVersion = $apiVersion;
        $this->apiType = $apiType;
        $this->apiUrl = $apiUrl;
    }

    /**
     * Get computed parameters
     *
     * @param array $data
     */
    protected function parameters(array $data = []): array
    {
        $parameters = array_merge($data, ['appid' => $this->apiKey]);

        return $parameters;
    }

    /**
     * Get computed endpoint
     *
     * @param string $uri
     */
    protected function getBaseUrl(string $uri): string
    {
        $url = $this->apiUrl . '/' . $this->apiType . '/' . $this->apiVersion . '/' . $uri;

        return $url;
    }

    /**
     * Get request
     *
     * @param string $uri
     * @param array $data
     */
    protected function get(string $uri, array $data = []): mixed
    {
        $response = Http::get($this->getBaseUrl($uri), $this->parameters($data));

        return $response->json();
    }
}
