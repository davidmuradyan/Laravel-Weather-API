<?php
namespace App\Http\Services;

use App\Http\Services\WeatherApi\OpenWeatherMapApi;
use App\Http\Services\WeatherApi\WeatherbitApi;
use App\Models\Weather;
use Carbon\Carbon;

class WeatherService
{
    private Weather $model;
    private OpenWeatherMapApi $openWeatherMapApi;
    private WeatherbitApi $weatherbitApi;

    public function __construct(Weather $model, OpenWeatherMapApi $openWeatherMapApi, WeatherbitApi $weatherbitApi)
    {
        $this->model = $model;
        $this->openWeatherMapApi = $openWeatherMapApi;
        $this->weatherbitApi = $weatherbitApi;
    }

    private function getWeatherFromApi($country, $city)
    {
        $temperatures = [];
        $temperatures[] = $this->openWeatherMapApi->get($country, $city);
        $temperatures[] = $this->weatherbitApi->get($country, $city);

        $temperatures = array_filter($temperatures, function($value) { return !is_null($value); });

        // ToDo: need to handle Exception in case, when both will API return null
        return array_sum($temperatures) / count($temperatures);
    }

    public function getWeather($country, $city)
    {
        $now = Carbon::now()->toDateString();

        $row = $this->model->getWeather($country, $city, $now);
        if ($row) {
            return $row->temperature;
        } else {
            $temperature = $this->getWeatherFromApi($country, $city);

            Weather::create([
                'country' => $country,
                'city' => $city,
                'date' => $now,
                'temperature' => $temperature,
            ]);

            return $temperature;

        }
    }
}
