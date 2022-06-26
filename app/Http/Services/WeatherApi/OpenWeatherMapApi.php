<?php
namespace App\Http\Services\WeatherApi;

use Dnsimmons\OpenWeather\OpenWeather;

class OpenWeatherMapApi implements WeatherInterface
{
    private OpenWeather $api;

    public function __construct(OpenWeather $openWeather)
    {
        $this->api = $openWeather;
    }


    public function get(string $country, string $city)
    {
        $response = $this->api->getCurrentWeatherByCityName($city, 'metric');
        if ($response) {
            return $response['forecast']['temp'];
        } else {
            return null;
        }
    }
}
