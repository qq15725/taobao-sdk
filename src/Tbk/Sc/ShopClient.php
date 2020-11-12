<?php

namespace Taobao\Tbk\Sc;

use Taobao\BaseClient;

class ShopClient extends BaseClient
{
    /**
     * taobao.tbk.sc.shop.convert (淘宝客-服务商-店铺链接转换)
     *
     * ￥开放平台免费API 需要授权
     *
     * 服务商使用。支持入参推广者对应的“推广位”和卖家id，获取对应的店铺推广链接。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=43878
     *
     * @param string|array $userIds 卖家id串，用,分割，从taobao.tbk.shop.get接口获取user_id字段
     * @param int $siteId mm_xxx_xxx_xxx的第2段数字
     * @param int $adzoneId mm_xxx_xxx_xxx的第3段数字
     * @param int|null $platform 链接形式-1：PC，2：无线。默认为１
     * @param null|string $unid (该字段不开放)自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     * @param array $fields 需返回的字段列表
     *
     * @return array
     */
    public function convert(
        $userIds,
        int $siteId,
        int $adzoneId,
        ?int $platform = null,
        ?string $unid = null,
        $fields = [
            'user_id',
            'click_url',
        ])
    {
        return $this->httpPostWithSession('taobao.tbk.sc.shop.convert', [
            'user_ids' => is_array($userIds) ? implode(',', $userIds) : $userIds,
            'site_id' => $siteId,
            'adzone_id' => $adzoneId,
            'unid' => $unid,
            'platform' => $platform,
            'fields' => is_array($fields) ? implode(',', $fields) : $fields,
        ]);
    }
}