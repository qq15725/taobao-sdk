<?php

namespace Taobao\Top;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Top\Auth\Auth $auth
 */
class Top extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["top.{$property}"])) {
            return $this->app["top.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.top service named "%s".', $property));
    }
}