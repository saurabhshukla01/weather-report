<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{   
    public function index(Request $request) {
        // Pass the data to the view
        return view('weather.index');
    }    

    public function weatherCurrent(Request $request) {
        $apiKey = '6a6c19e7801ba2c03f0318c3158ef306';
        $location = $request->get('query');
        
        // Call the OpenWeather API to get weather data
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$location&appid=$apiKey";
        $weatherData = json_decode(file_get_contents($apiUrl), true);

        $locationNew = $weatherDescriptionNew = $temperature = $feelsLike = $humidity = "";
        $locationNew = $weatherData['name'];
        $weatherDescriptionNew = $weatherData['weather'][0]['description'];
        $temperature = $weatherData['main']['temp'];
        $feelsLike = $weatherData['main']['feels_like'];
        $humidity = $weatherData['main']['humidity'];
        $html = "";
        $html .= "<p><b>Location</b>: $locationNew</p>
                <p><b>Weather</b>: $weatherDescriptionNew</p>
                <p><b>Temperature</b>: $temperature</p>
                <p><b>Feels Like</b>: $feelsLike</p>
                <p><b>Humidity</b>: $humidity%</p>";
        // Return the HTML as JSON
        return response()->json($html);
    }  

    public function next24Hours()
    {
        $apiKey = '6a6c19e7801ba2c03f0318c3158ef306';
        $latitude = '51.5074';  // Replace with the latitude of your location
        $longitude = '0.1278';  // Replace with the longitude of your location

        // URL-encode the API key
        $encodedApiKey = urlencode($apiKey);

        // Call the OpenWeather "One Call" API to get the next 24 hours of weather data
        // $apiUrl = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&exclude=current,minutely,daily,alerts&units=metric&appid=$apiKey";
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast/hourly?lat=$latitude&lon=$longitude&appid=$encodedApiKey";

        // Make a request to the API and parse the JSON response
        $hourlyForecastData = json_decode(file_get_contents($apiUrl), true);

        // Pass the data to the view
        return view('weather.next24hours', ['hourlyForecastData' => $hourlyForecastData]);
    }


    public function next7Days()
    {
        $apiKey = '6a6c19e7801ba2c03f0318c3158ef306';
        $latitude = '51.5074';  // Replace with the latitude of your location
        $longitude = '0.1278';  // Replace with the longitude of your location

        // URL-encode the API key
        $encodedApiKey = urlencode($apiKey);

        // Call the OpenWeather "One Call" API to get the next 7 days of weather data
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast/daily?lat=$latitude&lon=$longitude&cnt=7&appid=$encodedApiKey";

        // Make a request to the API and parse the JSON response
        $weatherData = json_decode(file_get_contents($apiUrl), true);

        // Extract the daily forecast data for the next 7 days
        $dailyForecast = $weatherData['daily'] ?? [];

        // Pass the data to the view
        return view('weather.next7days', ['dailyForecast' => $dailyForecast]);
    }


}
