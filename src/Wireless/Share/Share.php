<?php

namespace Taobao\Wireless\Share;

use SDK\Kernel\Exceptions\InvalidArgumentException;
use Taobao\BaseClient;

/**
 * @property \Taobao\Wireless\Share\Tpwd\Tpwd $tpwd
 */
class Share extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["wireless.share.{$property}"])) {
            return $this->app["wireless.share.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.wireless.share service named "%s".', $property));
    }
}