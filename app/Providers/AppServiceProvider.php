<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('web.footer', 'footer');
        Blade::component('web.elements.carousel.default', 'carousel');
        Blade::component('web.elements.social', 'social');
        Blade::component('web.elements.events.header', 'eventHeader');
    }
}
