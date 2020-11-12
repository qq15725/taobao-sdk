<?php

namespace Taobao\Tbk\Shop;

use Taobao\BaseClient;

class ShareClient extends BaseClient
{
    /**
     * taobao.tbk.shop.share.convert (淘宝客-推广者-店铺三方分成链接转换)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客店铺三方分成链接转换
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=24524
     *
     * @param string|array $userIds 卖家ID串，用','分割，从taobao.tbk.shop.get接口获取user_id字段
     * @param int $adzoneId 广告位ID，区分效果位置
     * @param string $subPid 三方pid，满足mm_xxx_xxx_xxx格式
     * @param int|null $platform 链接形式：1：PC，2：无线，默认：１
     * @param null|string $unid 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     * @param array $fields 需返回的字段列表
     *
     * @return array
     */
    public function convert(
        $userIds,
        int $adzoneId,
        string $subPid,
        ?int $platform = null,
        ?string $unid = null,
        $fields = [
            'user_id',
            'click_url'
        ])
    {
        return $this->httpPost('taobao.tbk.shop.share.convert', [
            'fields' => $fields,
            'user_ids' => $userIds,
            'platform' => $platform,
            'adzone_id' => $adzoneId,
            'sub_pid' => $subPid,
            'unid' => $unid,
        ]);
    }
}