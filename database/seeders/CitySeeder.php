<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(File::get(public_path('/cities/city.list.min.json')));
        $max = count($cities);
        if (!App::environment('production'))
            $max /= 100;
        $this->command->getOutput()->progressStart($max);
        $cnt = 0;
        foreach ($cities as $key => $record) {
            if (Str::upper($record->country) == 'IN') {
                $city = City::firstOrNew(['id' => $record->id]);
                $city->id = $record->id;
                $city->name = $record->name;
                $city->state = $record->state;
                $city->country = $record->country;
                $city->lon = $record->coord->lon;
                $city->lat = $record->coord->lat;
                $city->save();
                $this->command->getOutput()->progressAdvance();
                if (!App::environment('production') && $cnt++ > $max)
                    break;
            }
        }
        $this->command->getOutput()->progressFinish();
    }
}
