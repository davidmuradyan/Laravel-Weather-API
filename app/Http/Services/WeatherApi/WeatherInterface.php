<?php
namespace App\Http\Services\WeatherApi;

interface WeatherInterface {
    public function get(string $country, string $city);
}
