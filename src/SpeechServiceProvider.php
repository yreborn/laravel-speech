<?php

namespace Yreborn\LaravelSpeech;

use Illuminate\Support\ServiceProvider;

class SpeechServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('speech', function ($app) {
            return new Speech($app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/speech.php' => config_path('speech.php'),
        ]);
    }
}
