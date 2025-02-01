<?php

namespace Tests\Unit;

use App\Services\TimeService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TimeServiceTest extends TestCase
{
    public static function timeDataProvider(): array
    {
        return [
            'Set 1 - Evenly spaced' => [
                ['00:01:30.000', '00:01:35.000', '00:01:40.000', '00:01:45.000', '00:01:50.000'],
                '00:01:40.000',
            ],
            'Set 2 - Different times' => [
                ['00:03:30.000', '00:04:45.000', '00:05:00.000'],
                '00:04:25.000',
            ],
            'Set 3 - Short times' => [
                ['00:00:30.500', '00:00:31.500', '00:00:32.500'],
                '00:00:31.500',
            ],
            'Set 4 - Larger range' => [
                ['00:00:10.000', '00:05:00.000'],
                '00:02:35.000',
            ],
            'Set 5 - Single time' => [
                ['00:02:45.000'],
                '00:02:45.000',
            ],
            'Set 6 - With milliseconds' => [
                ['00:00:00.000', '00:00:00.500', '00:00:01.000', '00:00:01.515', '00:00:02.000'],
                '00:00:01.003',
            ],
            'Set 7 - Empty array' => [
                [],
                '00:00:00.000',
            ],
        ];
    }

    #[DataProvider('timeDataProvider')]
    public function test_average_time_is_calculated_correctly(array $times, string $expectedAverage): void
    {
        $average = TimeService::calculateAverage($times);
        $this->assertSame($expectedAverage, $average);
    }
}
