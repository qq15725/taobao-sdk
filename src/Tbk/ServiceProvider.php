<?php

namespace Taobao\Tbk;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['tbk'] = function ($app) {
            /** @var \Taobao\Application $app */
            $app->registerProviders([
                Coupon\ServiceProvider::class,
                Item\ServiceProvider::class,
                Privilege\ServiceProvider::class,
                Dg\ServiceProvider::class,
                Order\ServiceProvider::class,
                Sc\ServiceProvider::class,
                Tpwd\ServiceProvider::class,
                Shop\ServiceProvider::class,
                Activity\ServiceProvider::class,
            ]);

            return new Tbk($app);
        };
    }
}