<?php

namespace Taobao\Wireless\Share\Tpwd;

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
        $app['wireless.share.tpwd'] = function ($app) {
            return new Tpwd($app);
        };
    }
}