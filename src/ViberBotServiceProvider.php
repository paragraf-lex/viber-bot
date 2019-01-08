<?php

namespace Paragraf\ViberBot;

use Illuminate\Support\ServiceProvider;
use Paragraf\ViberBot\Commands\Webhook;

class ViberBotServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/viberbot.php' => config_path('viberbot.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                Webhook::class,
            ]);
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }
}
