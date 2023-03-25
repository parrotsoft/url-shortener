<?php

namespace Mlopez\UrlShortener;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mlopez\BaseApp\Console\Commands\LoadBaseAppCommand;
use Mlopez\UrlShortener\Console\Commands\InstallCommand;

class UrlShortenerServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
        }

        $this->publishes([
            __DIR__.'./config/urlshortener.php' => config_path('urlshortener.php')
        ],
        'url-shortener-config');
    }

    public function boot()
    {
        $this->loadMigrations();
        $this->registerRoutes();
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'database/migrations');

        $this->publishes(
            [
                __DIR__.'/database/migrations' => base_path('database/migrations')
            ],
            'url-shortener-migrations'
        );
    }
    
    private function loadConfig(): void
    {
        $this->mergeConfigFrom(__DIR__. './config/urlshortener.php', 'urlshortener');
    }

    private function registerRoutes(): void
    {
        Route::group(['prefix' => 'url-shortener'], function () {
            $this->loadRoutesFrom(__DIR__.'./routes/web.php');
        });
    }
}