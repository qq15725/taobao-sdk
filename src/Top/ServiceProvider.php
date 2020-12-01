<?php

namespace Taobao\Top;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Auth\ServiceProvider::class,
    ];

    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['top'] = function ($app) {
            /** @var \Taobao\Application $app */
            $app->registerProviders($this->providers);

            return new Top($app);
        };
    }
}