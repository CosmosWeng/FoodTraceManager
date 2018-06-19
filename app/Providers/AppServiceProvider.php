<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // SQL Logs
        if (config('app.debug')) {
            DB::enableQueryLog();
        }
      
        //
        Form::component('bsImage', 'components.images', ['name','images','attributes']);
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
