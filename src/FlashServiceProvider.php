<?php

namespace EZ\FlashMessages;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Setup integration & publishing of the config file
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'flash');
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('flash.php')
        ], 'config');

        // Setup view loading & publishing
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flash');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/flash')
        ], 'views');

        // Setup component publishing
        $this->publishes([
            __DIR__.'/../resources/js/components' => base_path('resources/js/components')
        ], 'vue');

        // Compose views
        $this->composeViews();
    }

    public function register()
    {
        // Bind the LaravelSessionStorage implementation to the SessionStore interface
        $this->app->bind('EZ\FlashMessages\SessionStore', 'EZ\FlashMessages\LaravelSessionStore');

        // Register the flash service as a singleton on the IoC container
        $this->app->singleton('flash', function ($app) {
            return $this->app->make('EZ\FlashMessages\FlashService');
        });
    }

    private function composeViews()
    {
        // Pass the config properties to the messages partial
        View::composer('flash::messages', function ($view) {
            $view->with('elevated', config('flash.elevated'));
        });
    }
}
