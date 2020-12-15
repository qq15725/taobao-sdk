<?php

namespace Taobao\Top;

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
        $app['top'] = function ($app) {
            /** @var \Taobao\Application $app */
            $app->registerProviders([
                Auth\ServiceProvider::class,
            ]);

            return new Top($app);
        };
    }
}