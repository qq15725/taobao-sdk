<?php

namespace Taobao\Tbk\Dg\Vegas;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.dg.vegas'] = function ($app) {
            return new Vegas($app);
        };

        $app['tbk.dg.vegas.tlj'] = function ($app) {
            return new Tlj\Tlj($app);
        };

        $app['tbk.dg.vegas.tlj.instance'] = function ($app) {
            return new Tlj\InstanceClient($app);
        };
    }
}