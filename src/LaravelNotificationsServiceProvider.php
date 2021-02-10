<?php

namespace Nanuc\LaravelNotifications;

use Illuminate\Support\ServiceProvider;

class LaravelNotificationsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/laravel-notifications.php' => config_path('laravel-notifications.php'),
        ]);
    }

    public function register()
    {

    }
}