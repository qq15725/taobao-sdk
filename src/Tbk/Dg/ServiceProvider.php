<?php

namespace Taobao\Tbk\Dg;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.dg'] = function ($app) {
            return new Dg($app);
        };

        $app['tbk.dg.material'] = function ($app) {
            return new MaterialClient($app);
        };

        $app['tbk.dg.optimus'] = function ($app) {
            return new OptimusClient($app);
        };

        $app['tbk.dg.vegas'] = function ($app) {
            return new Vegas\Vegas($app);
        };

        $app['tbk.dg.vegas.tlj'] = function ($app) {
            return new Vegas\Tlj\Tlj($app);
        };

        $app['tbk.dg.vegas.tlj.instance'] = function ($app) {
            return new Vegas\Tlj\InstanceClient($app);
        };
    }
}