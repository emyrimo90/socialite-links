<?php

namespace EmanElroukh\SocialiteLinks\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use EmanElroukh\SocialiteLinks\Components\SocialiteButton;

class SocialiteLinksServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //Load Routes
        $this->loadRoutes();
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        //Load migration
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // Load Views
        $this->loadViewsFrom(__DIR__."/../Resources/views", 'SocialiteLinks');
        // Publish Config
        $this->publishes([
            __DIR__ . '/../config/socialite-links.php' => config_path('socialite-links.php'),
            __DIR__.'/../assets' => public_path('vendor/socialite-links'),
        ]);
        // Register Blade Component
        Blade::component('socialite-button', SocialiteButton::class);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/socialite-links.php', 'socialite-links');
    }

    protected function loadRoutes():void
    {
        Route::middleware('web')  // You can change to 'api' if needed
            ->namespace('EmanElroukh\SocialiteLinks\Controllers')
            ->group(__DIR__ . '/../routes/web.php');
    }


}
