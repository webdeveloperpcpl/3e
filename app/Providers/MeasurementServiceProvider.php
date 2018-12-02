<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MeasurementServiceProvider extends ServiceProvider
{

    public function boot()
    {

    }

    public function register()
    {

        require_once app_path() . '/Helpers/Measurement.php';
    }
}
