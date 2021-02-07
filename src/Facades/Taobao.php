<?php

namespace Taobao\Facades;

use Illuminate\Support\Facades\Facade;
use Taobao\Application;

/**
 * @method static \Taobao\Tbk\Tbk tbk()
 * @method static \Taobao\Ip\Ip ip()
 * @method static \Taobao\Top\Top top()
 * @method static \Taobao\Time\Time time()
 * @method static \Taobao\OAuth\OAuth oauth()
 * @method static \Taobao\Itemcats\Itemcats itemcats()
 * @method static \Taobao\Wireless\Wireless wireless()
 *
 * @mixin Application
 */
class Taobao extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Application::class;
    }

    /**
     * @return Application
     */
    public static function getFacadeRoot()
    {
        return parent::getFacadeRoot();
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        if (!$instance) {
            throw new \RuntimeException('A facade root has not been set.');
        }

        if ($instance->offsetExists($method)) {
            return $instance->offsetGet($method);
        }

        return $instance->$method(...$args);
    }
}
