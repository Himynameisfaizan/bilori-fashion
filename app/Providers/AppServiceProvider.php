<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Manual file include with correct case
        require_once app_path('Services/IthinkLogisticsService.php');
        
        // Bind to service container
        $this->app->singleton(\App\Services\iThinkLogisticsService::class, function ($app) {
            return new \App\Services\iThinkLogisticsService();
        });
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}