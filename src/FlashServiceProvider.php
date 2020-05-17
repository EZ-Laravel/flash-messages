<?php

namespace EZ\FlashMessages;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // // Setup integration & publishing of the config file
        // $this->mergeConfigFrom(__DIR__."/../../config/config.php", "tessify-core");
        // $this->publishes([__DIR__."/../../config/config.php" => config_path("tessify-core.php")], "config");

        // Setup view loading & publishing
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flash');
        $this->publishes([__DIR__.'/../resources/views' => base_path('resources/views/vendor/flash')]);
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
}
