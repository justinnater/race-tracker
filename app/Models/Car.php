<?php

namespace App\Models;

use App\Services\TimeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function lapTimes()
    {
        return $this->hasMany(LapTime::class);
    }

    /**
     * Scope to order cars by fastest average lap time.
     */
    public function scopeOrderByFastest(Builder $query): Collection
    {
        return $query->with('lapTimes')->get()->sortBy(
            fn ($car) => TimeService::calculateAverage($car->lapTimes->pluck('lap_time')->toArray())
        )->values();
    }
}
