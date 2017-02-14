<?php

namespace Administer\Providers;

use Administer\Commands;
use Administer\Http\Middleware;
use Illuminate\Support\ServiceProvider;
use Administer\Providers\RouteServiceProvider;

class AdministerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->aliasMiddleware('administer', Middleware\Administer::class);

        $this->loadMigrationsFrom(__DIR__.'/../Resources/Migrations');

        $this->loadViewsFrom(__DIR__.'/../../resources/Views', 'administer');

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\MakeAdmin::class,
                Commands\RemoveAdmin::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../Resources/Config/administer.php' => config_path('administer.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../public' => public_path('administer_assets'),
        ], 'public');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}