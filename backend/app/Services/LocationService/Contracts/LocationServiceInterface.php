<?php

namespace App\Services\LocationService\Contracts;

interface LocationServiceInterface
{
    /**
     * Search locations
     *
     * @param string $searchKey
     * @param array $options
     */
    public function search(string $searchKey, array $options = []) : array;
}
