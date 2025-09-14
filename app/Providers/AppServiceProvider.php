<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Crop\CropManager;
use App\Services\Crop\ApiCropManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CropManager::class, ApiCropManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
