<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Repository\Category\CategoryRepository;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Repository\Product\ProductRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
