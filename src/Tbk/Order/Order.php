<?php

namespace Taobao\Tbk\Order;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Sc\Order\DetailsClient $details
 */
class Order extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.order.{$property}"])) {
            return $this->app["tbk.order.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Taobao.Tbk.Order service named "%s".', $property));
    }
}