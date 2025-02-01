<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['number' => 1, 'driver' => 'Max Verstappen', 'model' => 'RB20', 'team' => 'Red Bull Racing', 'color' => '#3671C6'],
            ['number' => 11, 'driver' => 'Sergio Perez', 'model' => 'RB20', 'team' => 'Red Bull Racing', 'color' => '#3671C6'],
            ['number' => 44, 'driver' => 'Lewis Hamilton', 'model' => 'W15', 'team' => 'Mercedes-AMG Petronas', 'color' => '#27F4D2'],
            ['number' => 63, 'driver' => 'George Russell', 'model' => 'W15', 'team' => 'Mercedes-AMG Petronas', 'color' => '#27F4D2'],
            ['number' => 16, 'driver' => 'Charles Leclerc', 'model' => 'SF-24', 'team' => 'Scuderia Ferrari', 'color' => '#E8002D '],
            ['number' => 55, 'driver' => 'Carlos Sainz', 'model' => 'SF-24', 'team' => 'Scuderia Ferrari', 'color' => '#E8002D '],
            ['number' => 4, 'driver' => 'Lando Norris', 'model' => 'MCL38', 'team' => 'McLaren', 'color' => '#FF8000'],
            ['number' => 81, 'driver' => 'Oscar Piastri', 'model' => 'MCL38', 'team' => 'McLaren', 'color' => '#FF8000'],
            ['number' => 14, 'driver' => 'Fernando Alonso', 'model' => 'AMR24', 'team' => 'Aston Martin', 'color' => '#229971'],
            ['number' => 18, 'driver' => 'Lance Stroll', 'model' => 'AMR24', 'team' => 'Aston Martin', 'color' => '#229971'],
            ['number' => 10, 'driver' => 'Pierre Gasly', 'model' => 'A524', 'team' => 'Alpine', 'color' => '#FF87BC'],
            ['number' => 31, 'driver' => 'Esteban Ocon', 'model' => 'A524', 'team' => 'Alpine', 'color' => '#FF87BC'],
            ['number' => 77, 'driver' => 'Valtteri Bottas', 'model' => 'C44', 'team' => 'Stake F1 Team', 'color' => '#DE3126'],
            ['number' => 24, 'driver' => 'Zhou Guanyu', 'model' => 'C44', 'team' => 'Stake F1 Team', 'color' => '#DE3126'],
            ['number' => 22, 'driver' => 'Yuki Tsunoda', 'model' => 'VCARB 01', 'team' => 'Visa Cash App RB', 'color' => '#6692FF'],
            ['number' => 3, 'driver' => 'Daniel Ricciardo', 'model' => 'Vcarb 01', 'team' => 'Visa Cash App RB', 'color' => '#6692FF'],
            ['number' => 20, 'driver' => 'Kevin Magnussen', 'model' => 'VF-24', 'team' => 'Haas F1 Team', 'color' => '#B6BABD'],
            ['number' => 27, 'driver' => 'Nico Hülkenberg', 'model' => 'VF-24', 'team' => 'Haas F1 Team', 'color' => '#B6BABD'],
            ['number' => 23, 'driver' => 'Alexander Albon', 'model' => 'FW46', 'team' => 'Williams', 'color' => '#64C4FF'],
            ['number' => 2, 'driver' => 'Logan Sargeant', 'model' => 'FW46', 'team' => 'Williams', 'color' => '#64C4FF'],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
