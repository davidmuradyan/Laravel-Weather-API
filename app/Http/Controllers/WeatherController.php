<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Http\Services\WeatherService;

class WeatherController extends Controller
{
    public function weather(WeatherRequest $request, WeatherService $weatherService)
    {
        $temperature = $weatherService->getWeather($request->country, $request->city);

        return view('temperature', [
            'temperature' => $temperature,
            'country' => $request->country,
            'city' => $request->city,
            ]);
    }
}
