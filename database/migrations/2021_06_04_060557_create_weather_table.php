<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('condition_name');
            $table->string('condition_desc');
            $table->string('condition_icon');
            $table->double('temp');
            $table->double('temp_min');
            $table->double('temp_max');
            $table->double('pressure');
            $table->double('humidity');
            $table->double('wind_speed');
            $table->double('wind_deg');
            $table->double('wind_gust');
            $table->timestamp('timestamp')->nullable();
            $table->timestamp('timestamp_sunrise')->nullable();
            $table->timestamp('timestamp_sunset')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather');
    }
}
