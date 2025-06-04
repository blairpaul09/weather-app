<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CurrentWeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'date' => Carbon::parse($this['dt'] + $this['timezone'])->format('F d, Y h:i A'),
            'visibility' => $this['visibility'] / 1000,
            'wind' => $this['wind'],
            'coordinates' => $this['coord'],
            'weather' => $this['weather'][0] ?? [],
            'base' => $this['base'],
            'main' => $this->main(),
            'clouds' => $this['clouds'][0]['all'] ?? null,
            'sys' => [
                'sunrise' => Carbon::parse($this['sys']['sunrise'] + $this['timezone'])->format('h:i A'),
                'sunset' => Carbon::parse($this['sys']['sunset'] + $this['timezone'])->format('h:i A'),
            ],
        ];
    }

    /**
     * Set main
     */
    private function main(): array
    {
        //kelvin to celcuis
        return [
            "temp" => $this->kelvinToCelcius($this['main']['temp']),
            "feels_like" => $this->kelvinToCelcius($this['main']['feels_like']),
            "temp_min" => $this->kelvinToCelcius($this['main']['temp_min']),
            "temp_max" => $this->kelvinToCelcius($this['main']['temp_min']),
            "pressure" => $this['main']['pressure'],
            "humidity" => $this['main']['humidity'],
            "sea_level" => $this['main']['sea_level'],
            "grnd_level" => $this['main']['grnd_level'],
        ];
    }

        /**
     * Convert kelvin to celcuis
     *
     * @param float $kelvin
     */
    private function kelvinToCelcius(float $kelvin): float
    {
        return (float)number_format($kelvin - 273.15, 1);
    }
}
