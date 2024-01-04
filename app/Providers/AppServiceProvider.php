<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->extend('Faker\Generator', function ($faker, $app) {
            $faker->addProvider(new AngolanBiProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categoriesMenu = Category::all();
        view()->share('categoriesMenu', $categoriesMenu);
        
        $brandsMenu = Brand::all();
        view()->share('brandsMenu', $brandsMenu);
    }
}
