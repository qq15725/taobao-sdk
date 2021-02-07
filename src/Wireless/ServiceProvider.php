<?php

namespace Taobao\Wireless;

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
        $app['wireless'] = function ($app) {
            /** @var \Taobao\Application $app */
            $app->registerProviders([
                Share\ServiceProvider::class,
            ]);

            return new Wireless($app);
        };
    }
}