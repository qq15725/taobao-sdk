<?php

namespace Taobao\Tbk\Item;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.item'] = function ($app) {
            return new Item($app);
        };

        $app['tbk.item.info'] = function ($app) {
            return new InfoClient($app);
        };

        $app['tbk.item.click'] = function ($app) {
            return new ClickClient($app);
        };

        $app['tbk.item.share'] = function ($app) {
            return new ShareClient($app);
        };
    }
}