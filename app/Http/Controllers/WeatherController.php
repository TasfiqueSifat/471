<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public static function getWeather()
    {
        $apiKey = env('WEATHER_API_KEY'); 
        $city = 'Dhaka';

        if (!$apiKey) {
            return null; 
        }

        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        try {
            $response = Http::get($url);

            if ($response->successful() && $response->json()) {
                $data = $response->json();

                return [
                    'city' => $data['name'] ?? 'Unknown',
                    'temp' => isset($data['main']['temp']) ? round($data['main']['temp']) : 'N/A',
                    'desc' => isset($data['weather'][0]['description']) ? ucfirst($data['weather'][0]['description']) : 'N/A',
                ];
            }
        } catch (\Exception $e) {
           
        }

        return null;
    }
}