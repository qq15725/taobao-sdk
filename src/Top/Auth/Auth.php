<?php

namespace Taobao\Top\Auth;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Top\Auth\Token $token
 */
class Auth extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["top.auth.{$property}"])) {
            return $this->app["top.auth.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.top.auth service named "%s".', $property));
    }
}