<?php

namespace Taobao\Tbk\Shop;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.shop'] = function ($app) {
            return new Shop($app);
        };

        $app['tbk.shop.recommend'] = function ($app) {
            return new RecommendClient($app);
        };

        $app['tbk.shop.share'] = function ($app) {
            return new ShareClient($app);
        };
    }
}