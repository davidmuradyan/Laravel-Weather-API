<?php
namespace App\Http\Services;

use App\Http\Services\WeatherApi\OpenWeatherMapApi;
use App\Http\Services\WeatherApi\WeatherbitApi;
use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

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

        // ToDo: throws Exception in case, both APIs return null
        return array_sum($temperatures) / count($temperatures);
    }

    public function getWeather($country, $city)
    {
        $now = Carbon::now()->toDateString();

        return Cache::remember("$country-$city-$now", 300, function () use ($country, $city, $now) {
            $data = $this->model->getWeather($country, $city, $now);
            if ($data) {
                return $data->temperature;
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
        });
    }
}
