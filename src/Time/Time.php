<?php

namespace Taobao\Time;

use Taobao\BaseClient;

class Time extends BaseClient
{
    /**
     * taobao.time.get(

     * )
     *
     * ￥开放平台基础API不需用户授权
     *
     * 获取淘宝系统当前时间
     *
     * @link https://open.taobao.com/api.htm?docId=120&docType=2
     *
     *
     * 还有个公开的接口
     *
     * @link http://api.m.taobao.com/rest/api3.do?api=mtop.common.getTimestamp
     *
     * @return array
     */
    public function get()
    {
        return $this->httpPost('taobao.time.get');
    }
}