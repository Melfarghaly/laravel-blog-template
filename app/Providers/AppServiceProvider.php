<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// added so as to prevent db string error
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // added so as to prevent db string error
        Schema::defaultStringlength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
