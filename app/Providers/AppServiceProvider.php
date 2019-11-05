<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\People;

use App\Observers\ArticleObserver;
use App\Observers\PeopleObserver;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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

        Blade::component('web.elements.menus.sort', 'sortmenu');

        Blade::component('web.elements.cards.research', 'research');
        Blade::component('web.elements.cards.new', 'new');
        Blade::component('web.elements.cards.domain', 'domain');
        Blade::component('web.elements.cards.figure', 'figure');
        Blade::component('web.elements.cards.events.event1', 'event1');
        Blade::component('web.elements.cards.events.event2', 'event2');

        Blade::component('web.elements.carousels.horizontal', 'carouselhorizontal');
        Blade::component('web.elements.carousels.vertical', 'carouselvertical');
        Blade::component('web.elements.carousels.figure', 'carouselfigure');
        Blade::component('web.elements.carousels.research', 'carouselresearch');
        Blade::component('web.elements.carousels.new', 'carouselnew');
        Blade::component('web.elements.carousels.domain', 'carouseldomain');

        Blade::component('web.elements.paginator', 'paginator');
        Blade::component('web.elements.modals.default', 'modalDefault');

        Blade::component('web.elements.alerts.info', 'alertinfo');
        Blade::component('web.elements.alerts.success', 'alertsuccess');
        Blade::component('web.elements.alerts.error', 'alerterror');
        Blade::component('web.elements.alerts.warning', 'alertwarning');

        # observer
        Article::observe(ArticleObserver::class);
        People::observe(PeopleObserver::class);

        # collection
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
