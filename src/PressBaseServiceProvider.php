<?php

namespace Sankokai\Press;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PressBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\ProcessCommand::class
        ]);
    }

    public function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'press');

        $this->registerRoutes();
    }

    protected function registerPublishing() 
    {
        $this->publishes([
        __DIR__ . '/../config/press.php' => config_path('press.php'),
        ], 'press-config');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            'prefix' => Press::path(),
        ];
    }
}
