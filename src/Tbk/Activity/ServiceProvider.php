<?php

namespace Taobao\Tbk\Activity;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.activity'] = function ($app) {
            return new ActivityClient($app);
        };

        $app['tbk.activity.info'] = function ($app) {
            return new InfoClient($app);
        };
    }
}