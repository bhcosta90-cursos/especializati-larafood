<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            return;
        }

        foreach (Permission::get() as $permission) {
            Gate::define($permission->name, fn (User $user) => $user->hasPermission($permission->name));
        }

        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
            return;
        });
    }
}
