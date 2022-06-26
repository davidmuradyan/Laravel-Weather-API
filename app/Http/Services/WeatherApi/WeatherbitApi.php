<?php
namespace App\Http\Services\WeatherApi;

use Attogram\Weatherbit\Weatherbit;

class WeatherbitApi implements WeatherInterface
{
    private Weatherbit $api;

    public function __construct(Weatherbit $weatherbit)
    {
        $weatherbit->setKey(env("WEATHERBIT_API_KEY"));
        $this->api = $weatherbit;
    }

    public function get(string $country, string $city)
    {
        $this->api->setLocationByCity($city, $country);
        $response = $this->api->getCurrent();

        if (!empty($response['data'])) {
            return $response['data'][0]['temp'];
        } else {
            return null;
        }
    }
}
