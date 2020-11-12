<?php

namespace Taobao\Tbk\Sc\Publisher;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Sc\Publisher\InfoClient $info
 */
class Publisher extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.sc.publisher.{$property}"])) {
            return $this->app["tbk.sc.publisher.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Taobao.Tbk.Sc service named "%s".', $property));
    }
}