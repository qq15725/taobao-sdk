<?php

namespace Taobao\Tbk\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.order'] = function ($app) {
            return new Order($app);
        };

        $app['tbk.order.details'] = function ($app) {
            return new DetailsClient($app);
        };
    }
}