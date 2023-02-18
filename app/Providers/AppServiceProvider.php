<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Plan;
use App\Observers\UrlObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Plan::observe(UrlObserver::class);
        Company::observe(UrlObserver::class);
    }
}
