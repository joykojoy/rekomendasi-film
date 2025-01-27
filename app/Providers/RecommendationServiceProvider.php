<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RecommendationService;

class RecommendationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
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
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
