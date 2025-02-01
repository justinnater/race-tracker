<?php

namespace App\Services;

/**
 * Service for doing calculations on time values.
 */
class TimeService
{
    /**
     * Calculate the average time from an array of times.
     *
     * @param array $times Array of lap times in format 'H:i:s.v'
     * @return string Average lap time formatted as 'H:i:s.v'
     */
    public static function calculateAverage(array $times): string
    {
        if (empty($times)) {
            return "00:00:00.000";
        }

        $totalMilliseconds = 0;
        $count = count($times);

        foreach ($times as $time) {
            [$h, $m, $s] = explode(':', $time);
            [$s, $ms] = explode('.', $s);
            $ms = str_pad($ms, 3, '0', STR_PAD_RIGHT); // Ensure milliseconds are always 3 digits

            // Convert time to total milliseconds
            $totalMilliseconds += ((int) $h * 3600 + (int) $m * 60 + (int) $s) * 1000 + (int) $ms;
        }

        // Calculate the average time in milliseconds
        $avgMilliseconds = (int) ($totalMilliseconds / $count);

        // Convert back to time format
        $h = str_pad(floor($avgMilliseconds / 3600000), 2, '0', STR_PAD_LEFT);
        $m = str_pad(floor(($avgMilliseconds % 3600000) / 60000), 2, '0', STR_PAD_LEFT);
        $s = str_pad(floor(($avgMilliseconds % 60000) / 1000), 2, '0', STR_PAD_LEFT);
        $ms = str_pad($avgMilliseconds % 1000, 3, '0', STR_PAD_LEFT);

        return "$h:$m:$s.$ms";
    }
}
