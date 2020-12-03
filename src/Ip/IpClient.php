<?php

namespace Taobao\Ip;

use Taobao\BaseClient;

class IpClient extends BaseClient
{
    /**
     * taobao.ip.get (外网Ip获取)
     *
     * ￥免费 不需要授权
     *
     * 外网Ip获取
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=27432
     *
     * @return array
     */
    public function get()
    {
        return $this->httpPost('taobao.ip.get');
    }
}