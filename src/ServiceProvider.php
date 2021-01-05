<?php

namespace Taobao;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置
        $this->publishes([
            dirname(__DIR__) . '/config/taobao.php' => function_exists('config_path')
                ? config_path('taobao.php')
                : base_path('config/taobao.php')
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (method_exists($this->app, 'configure')) {
            $this->app->configure('taobao');
        }

        $this->mergeConfigFrom(dirname(__DIR__) . '/config/taobao.php', 'taobao');


        $this->app->singleton(Application::class, function ($app) {
            return new Application(
                null,
                null,
                $app->make('config')->get('taobao', [])
            );
        });
    }
}
