<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Repositories\ProductsRepository;
use App\Core\Repositories\CategoriesRepository;
use App\Infraestructure\Repositories\EloquentProductsRepository;
use App\Infraestructure\Repositories\EloquentCategoriesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepository::class, EloquentProductsRepository::class);
        $this->app->bind(CategoriesRepository::class, EloquentCategoriesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
