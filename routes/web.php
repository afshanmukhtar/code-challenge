<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

use Illuminate\Http\Request;
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

Route::get('/', [WeatherController::class, 'index']);
Route::get('/city/noWeatherInfo', [WeatherController::class, 'getCityWithNoInfo']);
Route::get('/city/{id}', [WeatherController::class, 'weatherByCity']);
Route::post('/city', [WeatherController::class, 'weatherByCity']);
