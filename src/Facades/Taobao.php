<?php

namespace Taobao\Facades;

use Illuminate\Support\Facades\Facade;
use Taobao\Application;

/**
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
}
