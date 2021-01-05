<?php

namespace Taobao\Top\Auth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['top.auth'] = function ($app) {
            return new Auth($app);
        };

        $app['top.auth.token'] = function ($app) {
            return new Token($app);
        };
    }
}