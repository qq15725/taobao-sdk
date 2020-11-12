<?php

namespace Taobao\Tbk\Item;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Item\InfoClient $info
 * @property \Taobao\Tbk\Item\ClickClient $click
 * @property \Taobao\Tbk\Item\ShareClient $share
 */
class Item extends BaseClient
{
    /**
     * taobao.tbk.item.convert (淘宝客-推广者-商品链接转换)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客商品链接转换
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=24516
     *
     * @param string|array $numIids 商品ID串，用','分割，从taobao.tbk.item.get接口获取num_iid字段，最大40个
     * @param int $adzoneId 广告位ID，区分效果位置
     * @param int|null $platform 链接形式：1：PC，2：无线，默认：１
     * @param null|string $unid 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     * @param null|string $dx 1表示商品转通用计划链接，其他值或不传表示转营销计划链接
     * @param string|array $fields 需返回的字段列表
     *
     * @return array
     */
    public function convert(
        $numIids,
        int $adzoneId,
        ?int $platform = null,
        ?string $unid = null,
        ?string $dx = null,
        $fields = ['num_iid', 'click_url'])
    {
        return $this->httpPost('taobao.tbk.item.convert', [
            'num_iids' => is_array($numIids) ? implode(',', $numIids) : $numIids,
            'adzone_id' => $adzoneId,
            'unid' => $unid,
            'platform' => $platform,
            'dx' => $dx,
            'fields' => is_array($fields) ? implode(',', $fields) : $fields
        ]);
    }

    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["tbk.item.{$property}"])) {
            return $this->app["tbk.item.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Taobao.Tbk.Item service named "%s".', $property));
    }
}