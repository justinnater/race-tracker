<?php

namespace Tests\Feature;

use App\Http\Resources\CarResource;
use App\Http\Resources\LapTimeResource;
use App\Models\Car;
use App\Models\LapTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Helpers\JsonApiAsserter;
use Tests\TestCase;

class ResourceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verify a successful response when fetching an empty list of cars.
     */
    public function test_a_successful_empty_car_response(): void
    {
        $endpoint = '/api/car';
        $response = $this->get($endpoint);

        JsonApiAsserter::assertResponseIsJsonApi($response, $endpoint);

        $response->assertStatus(200);
    }

    /**
     * Verify a successful response when fetching cars.
     */
    public function test_a_successful_car_response(): void
    {
        $car = Car::factory()->create();

        $endpoint = '/api/car';
        $response = $this->get($endpoint);

        JsonApiAsserter::assertResponseIsJsonApi($response, $endpoint);

        $response->assertJson([
            'data' => [
                [
                    ...$this->carResourceData($car),
                    ...$this->relationshipData([]),
                ]
            ]
        ]);

        $response->assertStatus(200);
    }

    /**
     * Verify a successful response when fetching cars with lap times.
     */
    public function test_a_successful_car_response_with_lap_time(): void
    {
        $endpoint = '/api/car';

        $car = Car::factory()->create();
        $lapTime = LapTime::factory()->create(['car_id' => $car->id]);

        $response = $this->get($endpoint);

        JsonApiAsserter::assertResponseIsJsonApi($response, $endpoint);

        $response->assertJson([
            'data' => [
                [
                    ...$this->carResourceData($car),
                    ...$this->relationshipData([$lapTime]),
                ]
            ],
            'included' => [$this->includedData($lapTime)],
        ]);
    }

    /**
     * Verify a successful response when fetching a single car.
     */
    public function test_a_successful_single_car_response_with_lap_time(): void
    {
        $endpoint = '/api/car/1';

        $car = Car::factory()->create();
        $lapTime = LapTime::factory()->create(['car_id' => $car->id]);

        $response = $this->get($endpoint);

        $response->assertJson([
            'data' => [
                ...$this->carResourceData($car),
                ...$this->relationshipData([$lapTime]),
            ],
            'included' => [$this->includedData($lapTime)],
        ]);
    }

    /**
     * Verify an error response when fetching a single car that does not exist.
     */
    public function test_a_error_response_when_fetching_a_single_car_that_does_not_exist(): void
    {
        $endpoint = '/api/car/1';

        $response = $this->get($endpoint);

        $response->assertStatus(404);
    }

    /**
     * Verify an error response when fetching a single car that does not exist.
     */
    public function test_a_error_response_when_posting_a_new_lap_time_to_a_car_that_does_not_exist(): void
    {
        $endpoint = '/api/laptime/1';

        $response = $this->json('POST', $endpoint, [
            'lap_time' => '00:00:00.000',
        ]);

        $response->assertStatus(404);
    }

    /**
     * Verify a successful response when posting a new lap time.
     */
    public function test_a_successful_car_response_when_posting_a_new_car(): void
    {
        $car = Car::factory()->create();

        $endpoint = '/api/laptime/'.$car->id;

        // post as a json api request, only provide lap time as body
        $response = $this->json('POST', $endpoint, [
            'lap_time' => '00:00:00.000',
        ]);

        $response->assertStatus(200);

        $lapTime = LapTime::where('car_id', $car->id)->first();

        $response->assertJson([
            'data' => [
                ...$this->carResourceData($car),
                ...$this->relationshipData([$lapTime]),
            ],
            'included' => [$this->includedData($lapTime)],
        ]);
    }

    /**
     * Create the car resource data for the response.
     *
     * @param Car $car The car to create the resource data for.
     *
     * @return array The car resource data for the response.
     */
    private function carResourceData($car): array
    {
        return [
            'type' => CarResource::TYPE,
            'id' => $car->id,
            'attributes' => [
                'number' => $car->number,
                'driver' => $car->driver,
                'model' => $car->model,
                'team' => $car->team,
                'color' => $car->color,
                'average_lap_time' => "00:00:00.000",
            ],
        ];
    }

    /**
     * Create the included data for the response.
     *
     * @param LapTime $lapTime The lap time to include.
     *
     * @return array The included data for the response.
     */
    private function includedData(LapTime $lapTime): array
    {
        return [
            'type' => LapTimeResource::TYPE,
            'id' => $lapTime->id,
            'attributes' => [
                'lap_time' => $lapTime->lap_time,
            ],
        ];
    }

    /**
     * Create the relationship data for the response.
     *
     * @param array $lapTimes LapTime[]
     *
     * @return array[]
     */
    private function relationshipData(array $lapTimes): array
    {
        $data = [];

        foreach ($lapTimes as $lapTime) {
            $data[] = [
                'type' => LapTimeResource::TYPE,
                'id' => $lapTime->id,
            ];
        }

        return [
            'relationships' => [
                'lap_times' => [
                    'data' => [
                        ...$data,
                    ],
                ],
            ],
        ];
    }
}
