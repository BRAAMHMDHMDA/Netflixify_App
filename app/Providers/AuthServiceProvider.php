<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        //
    ];

    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole(config('permission.super_role_admin')) ? true : null;
        });
        Gate::before(function ($user, $ability) {
            return $user->username==='super_admin' ? true : null;
        });
    }
}
