<?php

namespace BlackBits\TellService;

use Illuminate\Support\ServiceProvider;


class TellServiceServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/tell_service.php' => config_path('tell_service.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton('TellService', function() {

            $error_handler = config('tell_service.error_handler') ?: TellServiceHandleErrorLaravelLog::class;
            return new TellService(new $error_handler);
        });
    }

    public function provides()
    {
        return ['TellService'];
    }
}