<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ForecastsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['city']['id'],
            'name' => $this['city']['name'],
            'country' => $this['city']['country'],
            'forecasts' => $this->forecasts(),
            'coordinates' => $this['city']['coord'],
        ];
    }

    /**
     * Map forecasts
     */
    private function forecasts(): array
    {
        return Arr::map($this['list'], function ($item) {
            return [
                'date' => Carbon::parse($item['dt'] + $this['city']['timezone'])->format('F d, Y h:i A'),
                'main' => $this->main($item['main']),
                'weather' => $item['weather'][0] ?? [],
                'clouds' => $item['clouds']['all'] ?? 0,
                'wind' => $item['wind'],
                'visibility' => isset($item['visibility']) ? $item['visibility'] / 1000 : null,
                'sys' => [
                    'sunrise' => Carbon::parse($this['city']['sunrise'] + $this['city']['timezone'])->format('h:i A'),
                    'sunset' => Carbon::parse($this['city']['sunset'] + $this['city']['timezone'])->format('h:i A'),
                ],
                'pop' => $item['pop'],
            ];
        });
    }

    /**
     * Set main
     * @param array $main
     */
    private function main(array $main): array
    {
        return [
            "temp" => $this->kelvinToCelcius($main['temp']),
            "feels_like" => $this->kelvinToCelcius($main['feels_like']),
            "temp_min" => $this->kelvinToCelcius($main['temp_min']),
            "temp_max" => $this->kelvinToCelcius($main['temp_min']),
            "pressure" => $main['pressure'],
            "humidity" => $main['humidity'],
            "sea_level" => $main['sea_level'],
            "grnd_level" => $main['grnd_level'],
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
