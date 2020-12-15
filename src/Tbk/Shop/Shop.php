<?php

namespace Taobao\Tbk\Shop;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Shop\RecommendClient $recommend
 * @property \Taobao\Tbk\Shop\ShareClient $share
 */
class Shop extends BaseClient
{
    /**
     * taobao.tbk.shop.get (淘宝客-推广者-店铺搜索)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客店铺查询
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=24521
     *
     * @param string $keyword 查询词
     * @param int $page 页大小
     * @param int $perPage 第几页
     * @param array $fields 需返回的字段列表
     * @param array $query 其他查询参数
     *
     * @return array
     */
    public function get(
        string $keyword,
        int $page = 1,
        int $perPage = 20,
        $fields = [
            'user_id',
            'shop_title',
            'shop_type',
            'seller_nick',
            'pict_url',
            'shop_url',
        ],
        array $query = []
    )
    {
        $query += [
            'q' => $keyword,
            'page_no' => $page,
            'page_size' => $perPage,
            'fields' => is_array($fields) ? implode(',', $fields) : $fields,
            'platform' => 2,
        ];

        return $this->httpPost('taobao.tbk.shop.get', $query);
    }

    /**
     * taobao.tbk.shop.convert (淘宝客-推广者-店铺链接转换)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客店铺链接转换
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=24523
     *
     * @param string|array $userIds 卖家ID串，用','分割，从taobao.tbk.shop.get接口获取user_id字段
     * @param int $adzoneId 广告位ID，区分效果位置
     * @param int|null $platform 链接形式：1：PC，2：无线，默认：１
     * @param null|string $unid 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     * @param array $fields 需返回的字段列表
     *
     * @return array
     */
    public function convert(
        $userIds,
        int $adzoneId,
        ?int $platform = null,
        ?string $unid = null,
        $fields = [
            'user_id',
            'click_url',
        ]
    )
    {
        return $this->httpPost('taobao.tbk.shop.convert', [
            'fields' => is_array($fields) ? implode(',', $fields) : $fields,
            'user_ids' => is_array($userIds) ? implode(',', $userIds) : $userIds,
            'platform' => $platform,
            'adzone_id' => $adzoneId,
            'unid' => $unid,
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
        if (isset($this->app["tbk.shop.{$property}"])) {
            return $this->app["tbk.shop.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No taobao.tbk.shop service named "%s".', $property));
    }
}