<?php

namespace Laralum\Profile;

use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_profile');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->publishes([
            __DIR__.'/Views/Public' => resource_path('views/vendor/Laralum/Profile'),
        ], 'laralum');

        $this->loadViewsFrom(__DIR__.'/Views/Laralum', 'laralum_profile'); //Loading private views
        $this->loadViewsFrom(resource_path('views/vendor/Laralum/Profile'), 'laralum_profile_public'); //Loading public views

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
