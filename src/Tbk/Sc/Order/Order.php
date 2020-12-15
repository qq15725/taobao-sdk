<?php

namespace Taobao\Tbk\Sc\Order;

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
        if (isset($this->app["tbk.sc.order.{$property}"])) {
            return $this->app["tbk.sc.order.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.tbk.sc.order service named "%s".', $property));
    }
}