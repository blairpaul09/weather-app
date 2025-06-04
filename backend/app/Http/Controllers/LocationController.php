<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Services\LocationService\Contracts\LocationServiceInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Create new Controller instance
     */
    public function __construct(private LocationServiceInterface $location) {}

    /**
     * Search location
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $locations = $this->location->search($request->q);

        return LocationResource::collection($locations);
    }
}
