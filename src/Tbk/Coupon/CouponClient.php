<?php

namespace Taobao\Tbk\Coupon;

use Taobao\BaseClient;

class CouponClient extends BaseClient
{
    /**
     * taobao.tbk.coupon.get (淘宝客-公用-阿里妈妈推广券详情查询)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 阿里妈妈推广券信息查询。传入商品ID+券ID，或者传入me参数，均可查询券信息。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=31106
     *
     * @param int|null $itemId 商品ID
     * @param string|null $activityId 券ID
     * @param string|null $me 带券ID与商品ID的加密串
     *
     * @return array
     */
    public function get(?int $itemId = null, ?string $activityId = null, ?string $me = null)
    {
        return $this->httpPost('taobao.tbk.coupon.get', [
            'me' => $me,
            'item_id' => $itemId,
            'activity_id' => $activityId,
        ]);
    }

    /**
     * taobao.tbk.coupon.convert (淘宝客-推广者-单品券高效转链)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 单品券高效转链API
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=29289
     *
     * @param int $adzoneId 推广位id，mm_xx_xx_xx pid三段式中的第三段
     * @param int|null $itemId 淘客商品id
     * @param int|null $platform 1：PC，2：无线，默认：１
     * @param null|string $relationId 渠道管理ID
     * @param null|string $specialId 会员运营ID
     * @param null|string $externalId 淘宝客外部用户标记，如自身系统账户ID；微信ID等
     * @param null|string $xid 团长与下游渠道合作的特殊标识，用于统计渠道推广效果
     *
     * @return array
     */
    public function convert(
        int $adzoneId,
        ?int $itemId = null,
        ?int $platform = null,
        ?string $relationId = null,
        ?string $specialId = null,
        ?string $externalId = null,
        ?string $xid = null
    )
    {
        return $this->httpPost('taobao.tbk.coupon.convert', [
            'item_id' => $itemId,
            'adzone_id' => $adzoneId,
            'platform' => $platform,
            'external_id' => $externalId,
            'special_id' => $specialId,
            'relation_id' => $relationId,
            'xid' => $xid,
        ]);
    }
}