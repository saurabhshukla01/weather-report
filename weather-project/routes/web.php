<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/weather-forecast', [WeatherController::class, 'index']);
Route::get('/weather-forecast-report', [WeatherController::class, 'weatherCurrent']);
Route::get('/next-24-hours', [WeatherController::class, 'next24Hours']);
Route::get('/next-7-days', [WeatherController::class, 'next7Days']);

