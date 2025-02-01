<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLapTimeRequest;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class LapTimeController
{
    /** Store a new lap time for a given car. */
    public function store(StoreLapTimeRequest $request, Car $car): JsonResponse
    {
        $lapTime = $request->input('lap_time');
        $car->lapTimes()->create(['car_id' => $car->id, 'lap_time' => $lapTime]);

        return (new CarController)->show($car);
    }

}
