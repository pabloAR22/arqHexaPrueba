<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Repositories\ProductsRepository;
use App\Infraestructure\Repositories\EloquentProductsRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepository::class, EloquentProductsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
