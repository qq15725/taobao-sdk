<?php

namespace Taobao\Tbk;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Coupon\CouponClient $coupon
 * @property \Taobao\Tbk\Shop\Shop $shop
 * @property \Taobao\Tbk\Item\Item $item
 * @property \Taobao\Tbk\Tpwd\TpwdClient $tpwd
 * @property \Taobao\Tbk\Privilege\PrivilegeClient $privilege
 * @property \Taobao\Tbk\Dg\Dg $dg
 * @property \Taobao\Tbk\Sc\Sc $sc
 * @property \Taobao\Tbk\Activity\ActivityClient $activity
 */
class Tbk extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.{$property}"])) {
            return $this->app["tbk.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Taobao.Tbk service named "%s".', $property));
    }
}