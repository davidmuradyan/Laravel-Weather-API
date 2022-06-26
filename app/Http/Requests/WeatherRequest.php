<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeatherRequest extends FormRequest
{
    public function rules()
    {
        return [
            'country' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string', 'max:255'],
        ];
    }
}
