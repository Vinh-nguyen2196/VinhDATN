<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Productype;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){


            $loai_sp=Productype::all();
            $view->with('loai',$loai_sp);
        });
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
