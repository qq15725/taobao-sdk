<?php

namespace Taobao\Wireless;

use SDK\Kernel\Exceptions\InvalidArgumentException;
use Taobao\BaseClient;

/**
 * @property \Taobao\Wireless\Share\Share $share
 */
class Wireless extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["wireless.{$property}"])) {
            return $this->app["wireless.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.wireless service named "%s".', $property));
    }
}