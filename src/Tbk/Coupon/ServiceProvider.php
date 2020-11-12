<?php

namespace Taobao\Tbk\Coupon;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.coupon'] = function ($app) {
            return new CouponClient($app);
        };
    }
}