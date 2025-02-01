<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Http\Resources\LapTimeResource;
use App\Models\Car;
use App\Models\LapTime;
use App\Services\JsonApiService;
use Illuminate\Http\JsonResponse;

class CarController
{
    /** Display the specified car. */
    public function show(Car $car): JsonResponse
    {
        $carResource = new CarResource($car);

        $jsonApiService = (new JsonApiService($carResource))
            ->setIncluded(LapTimeResource::collection($car->lapTimes));

        return response()->json($jsonApiService->toArray());
    }

    /** Display a listing of the cars. */
    public function index(): JsonResponse
    {
        $carCollection = CarResource::collection(Car::orderByFastest());
        $lapTimeCollection = LapTimeResource::collection(LapTime::all());

        $jsonApiService = (new JsonApiService($carCollection))
            ->setIncluded($lapTimeCollection);

        return response()->json($jsonApiService->toArray());
    }
}
