<?php

namespace Taobao\Tbk\Item;

use Taobao\BaseClient;

class InfoClient extends BaseClient
{
    /**
     * taobao.tbk.item.info.get (淘宝客-公用-淘宝客商品详情查询(简版))
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客商品详情查询（简版）
     *
     * @link http://developer.alibaba.com/docs/api.htm?apiId=24518
     *
     * @param string|array $numIids 商品ID或商品ID串
     * @param int|null $platform 链接形式：1：PC，2：无线
     * @param null|string $ip ip地址，影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
     *
     * @return array
     */
    public function get($numIids, ?int $platform = null, ?string $ip = null)
    {
        return $this->httpPost('taobao.tbk.item.info.get', [
            'num_iids' => is_array($numIids) ? implode(',', $numIids) : $numIids,
            'platform' => $platform,
            'ip' => $ip,
        ]);
    }
}