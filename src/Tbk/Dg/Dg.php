<?php

namespace Taobao\Tbk\Dg;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Dg\MaterialClient $material
 * @property \Taobao\Tbk\Dg\OptimusClient $optimus
 * @property \Taobao\Tbk\Dg\Vegas\Vegas $vegas
 */
class Dg extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.dg.{$property}"])) {
            return $this->app["tbk.dg.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.tbk.dg service named "%s".', $property));
    }
}