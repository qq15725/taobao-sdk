<?php

namespace Taobao\Tbk\Dg;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.dg'] = function ($app) {
            /** @var \Taobao\Application $app */
            $app->registerProviders([
                Vegas\ServiceProvider::class
            ]);

            return new Dg($app);
        };

        $app['tbk.dg.material'] = function ($app) {
            return new MaterialClient($app);
        };

        $app['tbk.dg.optimus'] = function ($app) {
            return new OptimusClient($app);
        };
    }
}