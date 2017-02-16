<?php

namespace Administer\Providers;

use Administer\Models\Role;
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

        Role::get()->each(function ($role, $key) {
            Gate::define($role->slug, function ($user) use ($role) {
                return $user->haveRole($role->slug);
            });
        });
    }
}
