<?php

namespace Taobao\Wireless\Share;

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
        $app['wireless.share'] = function ($app) {
            /** @var \Taobao\Application $app */
            $app->registerProviders([
                Tpwd\ServiceProvider::class,
            ]);

            return new Share($app);
        };
    }
}