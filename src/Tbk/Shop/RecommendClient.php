<?php

namespace Taobao\Tbk\Shop;

use Taobao\BaseClient;

class RecommendClient extends BaseClient
{
    /**
     * taobao.tbk.shop.recommend.get (淘宝客-公用-店铺关联推荐)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客店铺关联推荐查询
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=24522
     *
     * @param int $userId 卖家Id
     * @param int $count 返回数量，默认20，最大值40
     * @param int|null $platform 链接形式：1：PC，2：无线，默认：１
     * @param array $fields 需返回的字段列表
     *
     * @return array
     */
    public function get(int $userId, int $count = 20, ?int $platform = null, $fields = [
        'user_id',
        'shop_title',
        'shop_type',
        'seller_nick',
        'pict_url',
        'shop_url'
    ])
    {
        return $this->httpPost('taobao.tbk.shop.recommend.get', [
            'fields' => is_array($fields) ? implode(',', $fields) : $fields,
            'user_id' => $userId,
            'count' => $count,
            'platform' => $platform,
        ]);
    }
}