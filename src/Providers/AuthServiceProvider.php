<?php

namespace Administer\Providers;

use Illuminate\Support\Facades\Gate;
use App\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
            
        foreach (config('administer.roles', []) as $key => $value) {
            Gate::define($key, function ($user) use ($key) {
                return $user->haveRole($key);
            });
        }
    }
}
