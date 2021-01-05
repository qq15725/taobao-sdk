<?php

namespace Taobao\Itemcats;

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
        $app['itemcats'] = function ($app) {
            return new Itemcats($app);
        };
    }
}