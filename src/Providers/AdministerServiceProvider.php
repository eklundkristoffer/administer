<?php

namespace Administer\Providers;

use Administer\Commands;
use Administer\Providers;
use Administer\Http\Middleware;
use Seedster\SeedsterServiceProvider;
use Illuminate\Support\ServiceProvider;

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
                Commands\AddRole::class,
                Commands\DeleteRole::class,
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
        $this->app['seed.handler']->register(
            \Administer\Resources\Seeds\DatabaseSeeder::class
        );

        $this->app->register(Providers\AuthServiceProvider::class);
        $this->app->register(Providers\RouteServiceProvider::class);
        $this->app->register(SeedsterServiceProvider::class);
    }
}