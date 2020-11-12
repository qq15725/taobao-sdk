<?php

namespace Taobao\Tbk\Item;

use Taobao\BaseClient;

class ShareClient extends BaseClient
{
    /**
     * taobao.tbk.item.share.convert (淘宝客-推广者-商品三方分成链接转换)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客商品三方分成链接转换
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=24519
     *
     * @param string|array $numIids 商品ID串，用','分割，从taobao.tbk.item.get接口获取num_iid字段
     * @param int $adzoneId 广告位ID，区分效果位置
     * @param string $subPid 三方pid，满足mm_xxx_xxx_xxx格式
     * @param null|string $couponId 券id，券仅支持关联唯一一个商品，输入券id，请确保商品id也是唯一的
     * @param int|null $platform 链接形式：1：PC，2：无线，默认：１
     * @param null|string $dx 1表示商品转通用计划链接，其他值或不传表示优先转营销计划链接
     * @param array $fields 	需返回的字段列表
     *
     * @return array
     */
    public function convert(
        $numIids,
        int $adzoneId,
        string $subPid,
        ?string $couponId = null,
        ?int $platform = null,
        ?string $dx = null,
        $fields = [
            'num_iid',
            'click_url',
            'commission_rate',
            'coupon_amount',
            'coupon_click_url',
            'added_time',
            'item_status',
        ]
    )
    {
        return $this->httpPost('taobao.tbk.item.share.convert', [
            'fields' => is_array($fields) ? implode(',', $fields) : $fields,
            'num_iids' => is_array($numIids) ? implode(',', $numIids) : $numIids,
            'sub_pid' => $subPid,
            'platform' => $platform,
            'adzone_id' => $adzoneId,
            'dx' => $dx,
            'coupon_id' => $couponId
        ]);
    }
}