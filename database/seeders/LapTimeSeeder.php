<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LapTime;
use App\Models\Car;
use Faker\Factory as Faker;

class LapTimeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $cars = Car::all();

        foreach ($cars as $car) {
            for ($i = 0; $i < 3; $i++) {
                LapTime::create([
                    'car_id' => $car->id,
                    'lap_number' => $i + 1,
                    'lap_time' => $this->generateLapTime(),
                ]);
            }
        }
    }

    private function generateLapTime(): string
    {
        $minutes = 1;
        $seconds = rand(5, 40);
        $milliseconds = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        return sprintf('00:%02d:%02d.%s', $minutes, $seconds, $milliseconds);
    }
}
