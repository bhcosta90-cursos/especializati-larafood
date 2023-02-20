<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoryRepository,
    CompanyRepository
};

use App\Repositories\Eloquent\{
    CategoryEloquentRepository,
    CompanyEloquentRepository
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CompanyRepository::class, CompanyEloquentRepository::class);
        $this->app->bind(CategoryRepository::class, CategoryEloquentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
