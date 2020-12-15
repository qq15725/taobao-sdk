<?php

namespace Taobao\Tbk\Sc\Activity;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Sc\Activity\InfoClient $info
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
        if (isset($this->app["tbk.sc.activity.{$property}"])) {
            return $this->app["tbk.sc.activity.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.tbk.sc.activity service named "%s".', $property));
    }
}