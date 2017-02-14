<?php

namespace Administer\Providers;

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
        $this->loadMigrationsFrom(__DIR__.'/../Resources/Migrations');

        $this->publishes([
            __DIR__.'/../Resources/Config/administer.php' => config_path('administer.php'),
        ], 'config');
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