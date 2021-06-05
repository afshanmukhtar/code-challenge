<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use OpenWeather;
use Exception;
use stdClass;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return view('weather');
    }

    /**
     * Gets weather info by city name or  id
     * String $id name or id of city
     * returns JSON response with weather info
     */
    public function weatherByCity(Request $request, String $cityName)
    {
        try {
            $current = new stdClass;
            if (!empty($cityName)) {
                $cityName = trim($cityName);
                $ttl = env('CACHE_TTL', 10);

                $current = Cache::remember("cache_$cityName", $ttl * 60, function () use ($cityName) {
                    \Log::info("cache cleared of city: $cityName");
                    $weather = new OpenWeather();
                    return $weather->getCurrentByCity($cityName);
                });

                $current->status = 'success';
                $current->msg = 'Data fetched';
                $isWeatherInfoAvailable = 1;
            }
        } catch (Exception $e) {
            $isWeatherInfoAvailable = 0;
            $current->status = 'error';
            $current->msg = 'Invalid Input';
        }

        $city = City::firstOrNew(['name' => $cityName]);
        $city->isWeatherInfoAvailable = $isWeatherInfoAvailable;
        $city->save();

        return response()->json($current);
    }
    public function getCityWithNoInfo()
    {
        $cities = City::where(['isWeatherInfoAvailable' => 0])->get(['name', 'updated_at']);
        return view('no_weather_info', ['cities' => $cities]);
    }
}
