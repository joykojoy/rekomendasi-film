<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RecommendationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    

    public function register()
    {
        $this->app->singleton(RecommendationService::class, function ($app) {
            return new RecommendationService();
        });
    }
    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
