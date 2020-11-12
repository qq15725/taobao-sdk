<?php

namespace Taobao\Tbk\Tpwd;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.tpwd'] = function ($app) {
            return new TpwdClient($app);
        };
    }
}