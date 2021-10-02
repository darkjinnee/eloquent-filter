<?php

namespace Darkjinnee\EloquentFilter;

use Illuminate\Support\ServiceProvider;

class EloquentFilterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'darkjinnee');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'darkjinnee');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/eloquent-filter.php', 'eloquent-filter');

        // Register the service the package provides.
        $this->app->singleton('eloquent-filter', function ($app) {
            return new EloquentFilter;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['eloquent-filter'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/eloquent-filter.php' => config_path('eloquent-filter.php'),
        ], 'eloquent-filter.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/darkjinnee'),
        ], 'eloquent-filter.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/darkjinnee'),
        ], 'eloquent-filter.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/darkjinnee'),
        ], 'eloquent-filter.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
