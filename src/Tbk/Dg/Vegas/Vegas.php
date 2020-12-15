<?php

namespace Taobao\Tbk\Dg\Vegas;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Dg\Vegas\Tlj\Tlj $tlj
 */
class Vegas extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.dg.vegas.{$property}"])) {
            return $this->app["tbk.dg.vegas.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.tbk.dg.vegas service named "%s".', $property));
    }
}