<?php

namespace Taobao\Tbk\Sc;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Sc\MaterialClient $material
 * @property \Taobao\Tbk\Sc\InvitecodeClient $invitecode
 * @property \Taobao\Tbk\Sc\TpwdClient $tpwd
 * @property \Taobao\Tbk\Sc\OptimusClient $optimus
 * @property \Taobao\Tbk\Sc\ShopClient $shop
 * @property \Taobao\Tbk\Sc\Publisher\Publisher $publisher
 * @property \Taobao\Tbk\Sc\Order\Order $order
 * @property \Taobao\Tbk\Sc\Activity\Activity $activity
 */
class Sc extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.sc.{$property}"])) {
            return $this->app["tbk.sc.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Taobao.Tbk.Sc service named "%s".', $property));
    }
}