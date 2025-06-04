<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'country' => $this['country'],
            'country_code' => $this['country_code'],
            'city' => $this['city'] ?? '',
            'coordinates' => [
                'lon' =>  $this['lon'],
                'lat' =>  $this['lat'],
            ],
            'formatted' => $this['formatted'],
        ];
    }
}
