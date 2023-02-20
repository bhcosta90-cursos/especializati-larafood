<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoryRepository,
    CompanyRepository,
    ProductRepository,
    TableRepository
};

use App\Repositories\Eloquent\{
    CategoryEloquentRepository,
    CompanyEloquentRepository,
    ProductEloquentRepository,
    TableEloquentRepository
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
        $this->app->bind(TableRepository::class, TableEloquentRepository::class);
        $this->app->bind(ProductRepository::class, ProductEloquentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
