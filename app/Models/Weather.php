<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weather extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'country',
        'city',
        'date',
        'temperature',
    ];

    public function getWeather($country, $city, $date)
    {
        return Weather::where([
            'country' => $country,
            'city' => $city,
            'date' => $date,
        ])->first();
    }
}
