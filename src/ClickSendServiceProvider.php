<?php

namespace Codemonkey76\ClickSend;

use Illuminate\Support\ServiceProvider;

class ClickSendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('clicksend.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'clicksend');

        $this->app->singleton('clicksend', function () {
            return new ClickSend;
        });
    }
}
