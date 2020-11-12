<?php

namespace Taobao\Tbk\Sc;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbk.sc'] = function ($app) {
            return new Sc($app);
        };

        $app['tbk.sc.material'] = function ($app) {
            return new MaterialClient($app);
        };

        $app['tbk.sc.optimus'] = function ($app) {
            return new OptimusClient($app);
        };

        $app['tbk.sc.tpwd'] = function ($app) {
            return new TpwdClient($app);
        };

        $app['tbk.sc.invitecode'] = function ($app) {
            return new InvitecodeClient($app);
        };

        $app['tbk.sc.shop'] = function ($app) {
            return new ShopClient($app);
        };

        $app['tbk.sc.publisher'] = function ($app) {
            return new Publisher\Publisher($app);
        };

        $app['tbk.sc.publisher.info'] = function ($app) {
            return new Publisher\InfoClient($app);
        };

        $app['tbk.sc.order'] = function ($app) {
            return new Order\Order($app);
        };

        $app['tbk.sc.order.details'] = function ($app) {
            return new Order\DetailsClient($app);
        };

        $app['tbk.sc.activity'] = function ($app) {
            return new Activity\Activity($app);
        };

        $app['tbk.sc.activity.info'] = function ($app) {
            return new Activity\InfoClient($app);
        };
    }
}