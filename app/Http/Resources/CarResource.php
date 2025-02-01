<?php

namespace App\Http\Resources;

use App\Services\TimeService;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public const string TYPE = 'cars';

    public function toArray($request): array
    {
        return [
            'type' => self::TYPE,
            'id' => (string) $this->id,
            'attributes' => [
                'number' => $this->number,
                'driver' => $this->driver,
                'model' => $this->model,
                'team' => $this->team,
                'color' => $this->color,
                'average_lap_time' => TimeService::calculateAverage($this->lapTimes->pluck('lap_time')->toArray()),
            ],
            'relationships' => [
                'lap_times' => [
                    'data' => $this->lapTimes->map(fn($lapTime) => [
                        'type' => LapTimeResource::TYPE,
                        'id' => (string) $lapTime->id,
                    ]),
                ],
            ],
        ];
    }
}
