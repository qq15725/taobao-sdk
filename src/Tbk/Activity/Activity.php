<?php

namespace Taobao\Tbk\Activity;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Activity\Info $info
 */
class Activity extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.activity.{$property}"])) {
            return $this->app["tbk.activity.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.tbk.activity service named "%s".', $property));
    }
}