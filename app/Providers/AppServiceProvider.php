<?php

namespace App\Providers;

use App\Models\Article;
use App\Observers\ArticleObserver;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # blade
        Blade::component('web.footer', 'footer');
        
        Blade::component('web.elements.social', 'social');
        Blade::component('web.elements.events.header', 'eventHeader');
        Blade::component('web.elements.menus.sort', 'sortmenu');
        Blade::component('web.elements.figure', 'figure');

        Blade::component('web.elements.cards.research', 'research');
        Blade::component('web.elements.cards.new', 'new');

        Blade::component('web.elements.carousel.horizontal', 'carouselhorizontal');
        Blade::component('web.elements.carousel.vertical', 'carouselvertical');
        Blade::component('web.elements.carousel.figure', 'carouselfigure');
        Blade::component('web.elements.carousel.research', 'carouselresearch');
        Blade::component('web.elements.carousel.new', 'carouselnew');
        
        Blade::component('web.elements.paginator', 'paginator');

        # observer
        Article::observe(ArticleObserver::class);
    }
}
