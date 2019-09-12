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
        Blade::directive('pushonce', function ($expression) {
            $domain = explode(':', trim(substr($expression, 1, -1)));
            $push_name = $domain[0];
            $push_sub = $domain[1];
            $isDisplayed = '__pushonce_'.$push_name.'_'.$push_sub;
            return "<?php if(!isset(\$__env->{$isDisplayed})): \$__env->{$isDisplayed} = true; \$__env->startPush('{$push_name}'); ?>";
        });
        Blade::directive('endpushonce', function ($expression) {
            return '<?php $__env->stopPush(); endif; ?>';
        });
        # blade
        Blade::component('web.footer', 'footer');
        
        Blade::component('web.elements.social', 'social');
        Blade::component('web.elements.events.header', 'eventHeader');
        Blade::component('web.elements.menus.sort', 'sortmenu');
        Blade::component('web.elements.figure', 'figure');

        Blade::component('web.elements.cards.research', 'research');
        Blade::component('web.elements.cards.new', 'new');
        Blade::component('web.elements.cards.domain', 'domain');

        Blade::component('web.elements.carousel.horizontal', 'carouselhorizontal');
        Blade::component('web.elements.carousel.vertical', 'carouselvertical');
        Blade::component('web.elements.carousel.figure', 'carouselfigure');
        Blade::component('web.elements.carousel.research', 'carouselresearch');
        Blade::component('web.elements.carousel.new', 'carouselnew');
        Blade::component('web.elements.carousel.domain', 'carouseldomain');
        
        Blade::component('web.elements.paginator', 'paginator');

        Blade::component('web.elements.alert.info', 'alertinfo');
        Blade::component('web.elements.alert.success', 'alertsuccess');
        Blade::component('web.elements.alert.error', 'alerterror');
        Blade::component('web.elements.alertwarning', 'alertwarning');
        
        Blade::component('web.elements.toast', 'toast');
        # observer
        Article::observe(ArticleObserver::class);
    }
}
