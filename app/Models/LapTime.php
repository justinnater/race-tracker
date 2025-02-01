<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapTime extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'lap_time'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lapTime) {
            $lapTime->lap_number = static::where('car_id', $lapTime->car_id)->max('lap_number') + 1 ?? 1;
        });
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
