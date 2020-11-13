<?php

namespace Taobao;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Application::class, function ($app) {
            return new Application(
                null,
                null,
                false,
                $app->make('config')->get('taobao', [])
            );
        });
    }
}
