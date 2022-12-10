<?php

namespace Sankokai\Press;

use Illuminate\Support\ServiceProvider;

class PressBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerResources();
    }

    public function register()
    {
        
    }

    public function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
