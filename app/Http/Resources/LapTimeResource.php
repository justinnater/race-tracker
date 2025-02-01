<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LapTimeResource extends JsonResource
{
    public const string TYPE = 'lap_times';

    public function toArray($request): array
    {
        return [
            'type' => self::TYPE,
            'id' => (string) $this->id,
            'attributes' => [
                'lap_number' => $this->lap_number,
                'lap_time' => $this->lap_time,
            ],
        ];
    }
}
