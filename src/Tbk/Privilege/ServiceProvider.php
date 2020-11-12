<?php

namespace Taobao\Tbk\Privilege;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.privilege'] = function ($app) {
            return new PrivilegeClient($app);
        };
    }
}