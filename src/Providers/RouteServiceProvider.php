<?php

namespace Administer\Providers;

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        parent::mapWebRoutes();

        Route::group([
            'middleware' => 'web',
            'namespace' => 'Administer\Http\Controllers',
        ], function ($router) {
            require __DIR__.'/../routes/web.php';
        });
    }
}