<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{Slide2,Banner,Continent};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $data['slide2'] = Slide2::orderBy('id_slide2','desc')->take(8)->get();
        $data['cont'] = Continent::all();
        $data['banner'] = Banner::all();
        view()->share($data);
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
